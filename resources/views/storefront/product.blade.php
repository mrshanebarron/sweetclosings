@extends('layouts.storefront')
@section('title', $product->name . ' — Sweet Closings')

@section('content')
<section class="py-12 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="text-sm text-stone-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-amber-800">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('shop') }}" class="hover:text-amber-800">Shop</a>
            <span class="mx-2">/</span>
            <a href="{{ route('shop.category', $product->category->slug) }}" class="hover:text-amber-800">{{ $product->category->name }}</a>
            <span class="mx-2">/</span>
            <span class="text-stone-900 font-medium">{{ $product->name }}</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
            {{-- Product Image --}}
            <div class="relative aspect-square rounded-xl overflow-hidden bg-stone-100">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @if($product->isOnSale())
                    <span class="absolute top-4 left-4 bg-red-600 text-white text-sm font-bold px-3 py-1.5 rounded">SAVE {{ $product->savings_percent }}%</span>
                @endif
            </div>

            {{-- Product Details --}}
            <div class="flex flex-col justify-center">
                <p class="text-amber-700 font-semibold uppercase tracking-widest text-xs mb-3">{{ $product->category->name }}</p>
                <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">{{ $product->name }}</h1>

                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl font-bold text-stone-900">{{ $product->formatted_price }}</span>
                    @if($product->isOnSale())
                        <span class="text-lg text-stone-400 line-through">${{ number_format($product->compare_price, 2) }}</span>
                        <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded">{{ $product->savings_percent }}% OFF</span>
                    @endif
                </div>

                <p class="text-stone-600 leading-relaxed mb-6">{{ $product->short_description }}</p>

                {{-- Meta --}}
                <div class="flex flex-wrap gap-4 text-sm text-stone-500 mb-8 border-t border-b border-stone-200 py-4">
                    @if($product->serves)
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                            Serves {{ $product->serves }}
                        </div>
                    @endif
                    @if($product->dietary_info)
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                            {{ $product->dietary_info }}
                        </div>
                    @endif
                    @if($product->sku)
                        <div class="text-stone-400">SKU: {{ $product->sku }}</div>
                    @endif
                </div>

                {{-- Add to Cart --}}
                <form action="{{ route('cart.add') }}" method="POST" class="flex items-center gap-4 mb-8" x-data="{ qty: 1 }">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center border border-stone-300 rounded overflow-hidden">
                        <button type="button" @click="qty = Math.max(1, qty - 1)" class="px-3 py-3 text-stone-500 hover:bg-stone-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                        </button>
                        <input type="number" name="quantity" x-model="qty" min="1" max="50" class="w-14 text-center border-0 focus:ring-0 text-sm font-semibold">
                        <button type="button" @click="qty = Math.min(50, qty + 1)" class="px-3 py-3 text-stone-500 hover:bg-stone-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </div>
                    <button type="submit" class="flex-1 py-3.5 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition shadow-sm">
                        Add to Cart
                    </button>
                </form>

                {{-- Description --}}
                <div class="prose prose-stone prose-sm max-w-none">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        </div>

        {{-- Related Products --}}
        @if($related->isNotEmpty())
            <div class="mt-20 border-t border-stone-200 pt-16">
                <h2 class="text-2xl font-bold text-stone-900 mb-8" style="font-family: 'Playfair Display', serif;">You May Also Like</h2>
                <div class="grid sm:grid-cols-3 gap-8">
                    @foreach($related as $rel)
                        <a href="{{ route('product', $rel->slug) }}" class="group">
                            <div class="relative aspect-square rounded-lg overflow-hidden bg-stone-100 mb-4">
                                <img src="{{ $rel->image }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <h3 class="font-semibold text-stone-900 group-hover:text-amber-800 transition">{{ $rel->name }}</h3>
                            <p class="font-bold text-stone-900 mt-1">{{ $rel->formatted_price }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
