<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('sort_order')->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::ordered()->get();

        return view('admin.products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|string|max:500',
            'sku' => 'nullable|string|max:50|unique:products,sku',
            'serves' => 'nullable|integer|min:1',
            'dietary_info' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::ordered()->get();

        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|string|max:500',
            'sku' => 'nullable|string|max:50|unique:products,sku,' . $product->id,
            'serves' => 'nullable|integer|min:1',
            'dietary_info' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
