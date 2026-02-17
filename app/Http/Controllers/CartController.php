<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $lineTotal = $product->price * $qty;
                $items[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'line_total' => $lineTotal,
                ];
                $total += $lineTotal;
            }
        }

        return view('storefront.cart', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:50',
        ]);

        $cart = session('cart', []);
        $productId = $request->product_id;
        $qty = $request->quantity ?? 1;

        $cart[$productId] = ($cart[$productId] ?? 0) + $qty;

        session(['cart' => $cart]);
        session(['cart_count' => array_sum($cart)]);

        $product = Product::find($productId);

        return back()->with('success', "{$product->name} added to cart!");
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:0|max:50',
        ]);

        $cart = session('cart', []);
        $productId = $request->product_id;
        $qty = $request->quantity;

        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $qty;
        }

        session(['cart' => $cart]);
        session(['cart_count' => array_sum($cart)]);

        return back()->with('success', 'Cart updated.');
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        unset($cart[$request->product_id]);
        session(['cart' => $cart]);
        session(['cart_count' => array_sum($cart)]);

        return back()->with('success', 'Item removed from cart.');
    }
}
