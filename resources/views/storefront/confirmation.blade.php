@extends('layouts.storefront')
@section('title', 'Order Confirmed — Sweet Closings')

@section('content')
<section class="py-16 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-stone-900 mb-2" style="font-family: 'Playfair Display', serif;">Thank You!</h1>
        <p class="text-stone-500 mb-8">Your order has been placed. A confirmation email will be sent to {{ $order->billing_email }}.</p>

        <div class="bg-stone-50 rounded-xl p-6 border border-stone-200 text-left mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-stone-900">Order {{ $order->order_number }}</h2>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-{{ $order->status_color }}-100 text-{{ $order->status_color }}-800 uppercase">{{ $order->status }}</span>
            </div>

            <div class="space-y-3 mb-4">
                @foreach($order->items as $item)
                    <div class="flex justify-between text-sm">
                        <span class="text-stone-600">{{ $item->product_name }} &times; {{ $item->quantity }}</span>
                        <span class="font-medium">${{ number_format($item->line_total, 2) }}</span>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-stone-300 pt-3 space-y-1 text-sm">
                <div class="flex justify-between text-stone-600">
                    <span>Subtotal</span>
                    <span>${{ number_format($order->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-stone-600">
                    <span>Shipping</span>
                    <span>{{ $order->shipping == 0 ? 'Free' : '$' . number_format($order->shipping, 2) }}</span>
                </div>
                <div class="flex justify-between text-stone-600">
                    <span>Tax</span>
                    <span>${{ number_format($order->tax, 2) }}</span>
                </div>
                <div class="flex justify-between font-bold text-stone-900 text-base border-t border-stone-300 pt-2 mt-2">
                    <span>Total</span>
                    <span>${{ number_format($order->total, 2) }}</span>
                </div>
            </div>

            @if($order->giftMessage)
                <div class="mt-4 bg-amber-50 border border-amber-200 rounded-lg p-4">
                    <p class="text-xs text-amber-700 font-semibold uppercase tracking-wider mb-1">Gift Message</p>
                    <p class="text-sm text-stone-700 italic">"{{ $order->giftMessage->message }}"</p>
                    <p class="text-xs text-stone-500 mt-1">From {{ $order->giftMessage->sender_name }} to {{ $order->giftMessage->recipient_name }}</p>
                </div>
            @endif
        </div>

        <div class="text-sm text-stone-500 mb-6">
            <p><strong>Shipping to:</strong> {{ $order->shipping_name }}</p>
            <p>{{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
        </div>

        <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition">
            Continue Shopping
        </a>
    </div>
</section>
@endsection
