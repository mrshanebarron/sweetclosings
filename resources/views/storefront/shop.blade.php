@extends('layouts.storefront')
@section('title', isset($category) ? $category->name . ' — Sweet Closings' : 'Shop All — Sweet Closings')

@section('content')
<section class="py-12 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="text-sm text-stone-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-amber-800">Home</a>
            <span class="mx-2">/</span>
            @if(isset($category))
                <a href="{{ route('shop') }}" class="hover:text-amber-800">Shop</a>
                <span class="mx-2">/</span>
                <span class="text-stone-900 font-medium">{{ $category->name }}</span>
            @else
                <span class="text-stone-900 font-medium">Shop All</span>
            @endif
        </nav>

        <div class="flex flex-col lg:flex-row gap-12">
            {{-- Sidebar --}}
            <aside class="lg:w-56 flex-shrink-0">
                <h3 class="font-semibold text-stone-900 mb-4 uppercase text-xs tracking-widest">Categories</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('shop') }}" class="block py-1 text-sm {{ !isset($category) ? 'text-amber-800 font-semibold' : 'text-stone-600 hover:text-amber-800' }} transition">
                            All Products
                        </a>
                    </li>
                    @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('shop.category', $cat->slug) }}" class="block py-1 text-sm {{ isset($category) && $category->id === $cat->id ? 'text-amber-800 font-semibold' : 'text-stone-600 hover:text-amber-800' }} transition">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            {{-- Product Grid --}}
            <div class="flex-1">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">
                            {{ isset($category) ? $category->name : 'All Products' }}
                        </h1>
                        @if(isset($category) && $category->description)
                            <p class="text-stone-500 mt-2 max-w-lg">{{ $category->description }}</p>
                        @endif
                    </div>
                    <p class="text-sm text-stone-500">{{ $products->total() }} {{ Str::plural('product', $products->total()) }}</p>
                </div>

                @if($products->isEmpty())
                    <div class="text-center py-20 text-stone-400">
                        <p class="text-lg">No products found in this category.</p>
                        <a href="{{ route('shop') }}" class="inline-block mt-4 text-amber-800 font-medium hover:underline">Browse all products</a>
                    </div>
                @else
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">
                        @foreach($products as $product)
                            <a href="{{ route('product', $product->slug) }}" class="group">
                                <div class="relative aspect-square rounded-lg overflow-hidden bg-stone-100 mb-4">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    @if($product->isOnSale())
                                        <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">SAVE {{ $product->savings_percent }}%</span>
                                    @endif
                                    @if($product->is_featured)
                                        <span class="absolute top-3 right-3 bg-amber-800 text-white text-xs font-bold px-2 py-1 rounded">BEST SELLER</span>
                                    @endif
                                </div>
                                <p class="text-xs text-amber-700 font-medium uppercase tracking-wider mb-1">{{ $product->category->name }}</p>
                                <h3 class="font-semibold text-stone-900 group-hover:text-amber-800 transition">{{ $product->name }}</h3>
                                <p class="text-sm text-stone-500 mt-1 line-clamp-2">{{ $product->short_description }}</p>
                                <div class="mt-2 flex items-center gap-2">
                                    <span class="font-bold text-stone-900">{{ $product->formatted_price }}</span>
                                    @if($product->isOnSale())
                                        <span class="text-sm text-stone-400 line-through">${{ number_format($product->compare_price, 2) }}</span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
