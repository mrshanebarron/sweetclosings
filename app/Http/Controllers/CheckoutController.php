<?php

namespace App\Http\Controllers;

use App\Models\GiftMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop')->with('success', 'Your cart is empty.');
        }

        $items = [];
        $subtotal = 0;

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $lineTotal = $product->price * $qty;
                $items[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'line_total' => $lineTotal,
                ];
                $subtotal += $lineTotal;
            }
        }

        $shipping = $subtotal >= 75 ? 0 : 8.95;
        $tax = round($subtotal * 0.08, 2);
        $total = $subtotal + $shipping + $tax;

        return view('storefront.checkout', compact('items', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:2',
            'shipping_zip' => 'required|string|max:10',
            'billing_email' => 'required|email',
            'gift_message' => 'nullable|string|max:500',
            'gift_sender' => 'nullable|string|max:255',
            'gift_recipient' => 'nullable|string|max:255',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop');
        }

        $subtotal = 0;
        $orderItems = [];

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $lineTotal = $product->price * $qty;
                $subtotal += $lineTotal;
                $orderItems[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $qty,
                    'line_total' => $lineTotal,
                ];
            }
        }

        $shipping = $subtotal >= 75 ? 0 : 8.95;
        $tax = round($subtotal * 0.08, 2);
        $total = $subtotal + $shipping + $tax;

        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => auth()->id(),
            'status' => 'pending',
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => $total,
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_zip' => $request->shipping_zip,
            'shipping_phone' => $request->shipping_phone,
            'billing_email' => $request->billing_email,
            'notes' => $request->notes,
        ]);

        foreach ($orderItems as $item) {
            $order->items()->create($item);
        }

        if ($request->filled('gift_message')) {
            GiftMessage::create([
                'order_id' => $order->id,
                'sender_name' => $request->gift_sender ?? 'A Friend',
                'recipient_name' => $request->gift_recipient ?? $request->shipping_name,
                'message' => $request->gift_message,
            ]);
        }

        session()->forget(['cart', 'cart_count']);

        return redirect()->route('order.confirmation', $order->order_number);
    }

    public function confirmation(string $orderNumber)
    {
        $order = Order::with('items', 'giftMessage')->where('order_number', $orderNumber)->firstOrFail();

        return view('storefront.confirmation', compact('order'));
    }
}
