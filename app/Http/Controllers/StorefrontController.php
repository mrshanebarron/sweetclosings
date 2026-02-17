<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class StorefrontController extends Controller
{
    public function home()
    {
        $featured = Product::with('category')->active()->featured()->limit(4)->get();
        $categories = Category::active()->ordered()->withCount('products')->get();

        return view('storefront.home', compact('featured', 'categories'));
    }

    public function shop()
    {
        $categories = Category::active()->ordered()->get();
        $products = Product::with('category')->active()->orderBy('sort_order')->paginate(12);

        return view('storefront.shop', compact('products', 'categories'));
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::active()->ordered()->get();
        $products = $category->activeProducts()->orderBy('sort_order')->paginate(12);

        return view('storefront.shop', compact('products', 'categories', 'category'));
    }

    public function product(string $slug)
    {
        $product = Product::with('category', 'images')->where('slug', $slug)->firstOrFail();
        $related = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(3)
            ->get();

        return view('storefront.product', compact('product', 'related'));
    }

    public function about()
    {
        return view('storefront.about');
    }

    public function contact()
    {
        return view('storefront.contact');
    }

    public function faq()
    {
        return view('storefront.faq');
    }
}
