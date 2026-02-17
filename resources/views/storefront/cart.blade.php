@extends('layouts.storefront')
@section('title', 'Your Cart — Sweet Closings')

@section('content')
<section class="py-12 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-stone-900 mb-8" style="font-family: 'Playfair Display', serif;">Your Cart</h1>

        @if(empty($items))
            <div class="text-center py-20">
                <svg class="w-16 h-16 text-stone-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <p class="text-lg text-stone-500 mb-4">Your cart is empty</p>
                <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-amber-800 text-white font-semibold rounded hover:bg-amber-900 transition">
                    Start Shopping
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($items as $item)
                    <div class="flex gap-6 py-6 border-b border-stone-200">
                        <a href="{{ route('product', $item['product']->slug) }}" class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-stone-100">
                            <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                        </a>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between">
                                <div>
                                    <a href="{{ route('product', $item['product']->slug) }}" class="font-semibold text-stone-900 hover:text-amber-800 transition">{{ $item['product']->name }}</a>
                                    <p class="text-sm text-stone-500 mt-0.5">{{ $item['product']->category->name }}</p>
                                </div>
                                <p class="font-bold text-stone-900">${{ number_format($item['line_total'], 2) }}</p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                    <select name="quantity" onchange="this.form.submit()" class="text-sm border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <span class="text-sm text-stone-500">&times; {{ $item['product']->formatted_price }}</span>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-800 transition">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Cart Summary --}}
            <div class="mt-8 bg-stone-50 rounded-xl p-6 border border-stone-200">
                <div class="flex justify-between text-sm text-stone-600 mb-2">
                    <span>Subtotal</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between text-sm text-stone-600 mb-2">
                    <span>Shipping</span>
                    <span>{{ $total >= 75 ? 'Free' : '$8.95' }}</span>
                </div>
                @if($total < 75)
                    <p class="text-xs text-amber-700 mb-3">Add ${{ number_format(75 - $total, 2) }} more for free shipping!</p>
                @endif
                <div class="flex justify-between text-lg font-bold text-stone-900 border-t border-stone-300 pt-3 mt-3">
                    <span>Estimated Total</span>
                    <span>${{ number_format($total + ($total >= 75 ? 0 : 8.95) + round($total * 0.08, 2), 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="block w-full text-center mt-6 py-3.5 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition shadow-sm">
                    Proceed to Checkout
                </a>
                <a href="{{ route('shop') }}" class="block text-center mt-3 text-sm text-stone-500 hover:text-amber-800 transition">Continue Shopping</a>
            </div>
        @endif
    </div>
</section>
@endsection
