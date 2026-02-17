@extends('layouts.storefront')
@section('title', 'Checkout — Sweet Closings')

@section('content')
<section class="py-12 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-stone-900 mb-8" style="font-family: 'Playfair Display', serif;">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid lg:grid-cols-3 gap-12">
                {{-- Form --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Shipping --}}
                    <div>
                        <h2 class="text-lg font-semibold text-stone-900 mb-4">Shipping Address</h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-stone-700 mb-1">Recipient Name *</label>
                                <input type="text" name="shipping_name" value="{{ old('shipping_name') }}" required class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                @error('shipping_name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-stone-700 mb-1">Street Address *</label>
                                <input type="text" name="shipping_address" value="{{ old('shipping_address') }}" required class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">City *</label>
                                <input type="text" name="shipping_city" value="{{ old('shipping_city') }}" required class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">State *</label>
                                    <input type="text" name="shipping_state" value="{{ old('shipping_state') }}" maxlength="2" required placeholder="AL" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">ZIP *</label>
                                    <input type="text" name="shipping_zip" value="{{ old('shipping_zip') }}" required class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Phone</label>
                                <input type="tel" name="shipping_phone" value="{{ old('shipping_phone') }}" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Email *</label>
                                <input type="email" name="billing_email" value="{{ old('billing_email') }}" required class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                            </div>
                        </div>
                    </div>

                    {{-- Gift Message --}}
                    <div x-data="{ showGift: false }">
                        <button type="button" @click="showGift = !showGift" class="flex items-center gap-2 text-amber-800 font-medium hover:text-amber-900 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 5a3 3 0 015-3 3 3 0 015 3H5zm-1 3v8a2 2 0 002 2h8a2 2 0 002-2V8H4zm4 2a1 1 0 012 0v4a1 1 0 11-2 0v-4z" clip-rule="evenodd"/></svg>
                            Add a Gift Message
                            <svg class="w-4 h-4 transition" :class="showGift ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="showGift" x-cloak x-transition class="mt-4 space-y-4 bg-amber-50 border border-amber-200 rounded-lg p-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">From (your name)</label>
                                    <input type="text" name="gift_sender" value="{{ old('gift_sender') }}" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">To (recipient name)</label>
                                    <input type="text" name="gift_recipient" value="{{ old('gift_recipient') }}" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Gift Message</label>
                                <textarea name="gift_message" rows="3" maxlength="500" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500" placeholder="Congratulations on your new home! Wishing you many happy years here.">{{ old('gift_message') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Order Notes (optional)</label>
                        <textarea name="notes" rows="2" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500" placeholder="Special delivery instructions, allergies, etc.">{{ old('notes') }}</textarea>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div>
                    <div class="bg-stone-50 rounded-xl p-6 border border-stone-200 sticky top-28">
                        <h2 class="text-lg font-semibold text-stone-900 mb-4">Order Summary</h2>
                        <div class="space-y-3 mb-4">
                            @foreach($items as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-stone-600">{{ $item['product']->name }} &times; {{ $item['quantity'] }}</span>
                                    <span class="font-medium">${{ number_format($item['line_total'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-t border-stone-300 pt-3 space-y-2">
                            <div class="flex justify-between text-sm text-stone-600">
                                <span>Subtotal</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-stone-600">
                                <span>Shipping</span>
                                <span>{{ $shipping == 0 ? 'Free' : '$' . number_format($shipping, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-stone-600">
                                <span>Tax</span>
                                <span>${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold text-stone-900 border-t border-stone-300 pt-3 mt-2">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-amber-50 border border-amber-200 rounded-lg text-center">
                            <p class="text-sm text-amber-800 font-medium">Demo Mode</p>
                            <p class="text-xs text-amber-600 mt-1">Stripe integration ready — no real charges in demo.</p>
                        </div>

                        <button type="submit" class="w-full mt-4 py-3.5 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition shadow-sm">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
