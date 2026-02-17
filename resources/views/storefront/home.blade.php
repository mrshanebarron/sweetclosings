@extends('layouts.storefront')
@section('title', 'Sweet Closings — Artisan Cookie Gifts for Real Estate Professionals')

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden bg-stone-900">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=1600&q=80" alt="Artisan cookies" class="w-full h-full object-cover opacity-30">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 md:py-40">
        <div class="max-w-2xl">
            <p class="text-amber-400 font-semibold uppercase tracking-[0.25em] text-sm mb-4" style="font-family: 'Inter', sans-serif;">For Real Estate Professionals</p>
            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6" style="font-family: 'Playfair Display', serif;">
                Every Closing<br>Deserves Something <em class="text-amber-400 not-italic">Sweet</em>
            </h1>
            <p class="text-lg text-stone-300 leading-relaxed mb-8 max-w-lg" style="font-family: 'Inter', sans-serif;">
                Handcrafted cookie gifts that turn closings into celebrations, referrals into relationships, and your brand into something they remember.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('shop') }}" class="inline-flex items-center px-8 py-4 bg-amber-700 hover:bg-amber-800 text-white font-semibold rounded transition shadow-lg shadow-amber-900/30" style="font-family: 'Inter', sans-serif;">
                    Shop Gifts
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('shop.category', 'corporate') }}" class="inline-flex items-center px-8 py-4 border border-stone-500 text-stone-300 hover:border-amber-400 hover:text-amber-400 font-semibold rounded transition" style="font-family: 'Inter', sans-serif;">
                    Corporate Orders
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Trust Bar --}}
<section class="bg-white border-b border-stone-200 py-8" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-2xl font-bold text-amber-800">500+</div>
                <div class="text-sm text-stone-500 mt-1">Agents Served</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-amber-800">12,000+</div>
                <div class="text-sm text-stone-500 mt-1">Cookies Delivered</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-amber-800">4.9/5</div>
                <div class="text-sm text-stone-500 mt-1">Customer Rating</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-amber-800">Free Ship</div>
                <div class="text-sm text-stone-500 mt-1">Orders Over $75</div>
            </div>
        </div>
    </div>
</section>

{{-- How It Works --}}
<section class="py-20 bg-stone-50" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">How It Works</h2>
            <p class="text-stone-500 max-w-xl mx-auto">Three simple steps to make your clients' day — and build the relationship that brings referrals.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-12">
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold" style="font-family: 'Playfair Display', serif;">1</div>
                <h3 class="text-lg font-semibold mb-2">Choose Your Gift</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Browse our curated collections designed for closings, referrals, holidays, and corporate events.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold" style="font-family: 'Playfair Display', serif;">2</div>
                <h3 class="text-lg font-semibold mb-2">Personalize It</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Add your branding, a gift message, and your client's delivery address. We handle the rest.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold" style="font-family: 'Playfair Display', serif;">3</div>
                <h3 class="text-lg font-semibold mb-2">Deliver Delight</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Fresh-baked cookies arrive at their door. You get the thank-you text. Everybody wins.</p>
            </div>
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Best Sellers</h2>
                <p class="text-stone-500 mt-2" style="font-family: 'Inter', sans-serif;">The gifts agents order again and again.</p>
            </div>
            <a href="{{ route('shop') }}" class="hidden md:inline-flex items-center text-amber-800 font-semibold hover:text-amber-900 transition text-sm" style="font-family: 'Inter', sans-serif;">
                View All
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featured as $product)
                <a href="{{ route('product', $product->slug) }}" class="group">
                    <div class="relative aspect-square rounded-lg overflow-hidden bg-stone-100 mb-4">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($product->isOnSale())
                            <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">SAVE {{ $product->savings_percent }}%</span>
                        @endif
                    </div>
                    <div style="font-family: 'Inter', sans-serif;">
                        <p class="text-xs text-amber-700 font-medium uppercase tracking-wider mb-1">{{ $product->category->name }}</p>
                        <h3 class="font-semibold text-stone-900 group-hover:text-amber-800 transition">{{ $product->name }}</h3>
                        <p class="text-sm text-stone-500 mt-1 line-clamp-2">{{ $product->short_description }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <span class="font-bold text-stone-900">{{ $product->formatted_price }}</span>
                            @if($product->isOnSale())
                                <span class="text-sm text-stone-400 line-through">${{ number_format($product->compare_price, 2) }}</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Categories --}}
<section class="py-20 bg-stone-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Shop by Occasion</h2>
            <p class="text-stone-500 mt-2" style="font-family: 'Inter', sans-serif;">The right gift for every milestone in the client relationship.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $cat)
                <a href="{{ route('shop.category', $cat->slug) }}" class="group relative bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition border border-stone-200 text-center">
                    <div class="w-14 h-14 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($cat->slug === 'closing-day')
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                        @elseif($cat->slug === 'referral-thanks')
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                        @elseif($cat->slug === 'seasonal')
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zm7-10a1 1 0 01.707.293l.707.707.707-.707A1 1 0 0115.414 3l-.707.707.707.707a1 1 0 01-1.414 1.414L13.293 5.12l-.707.707a1 1 0 01-1.414-1.414l.707-.707-.707-.707A1 1 0 0112 2z" clip-rule="evenodd"/></svg>
                        @else
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/></svg>
                        @endif
                    </div>
                    <h3 class="font-semibold text-stone-900 mb-1" style="font-family: 'Inter', sans-serif;">{{ $cat->name }}</h3>
                    <p class="text-sm text-stone-500" style="font-family: 'Inter', sans-serif;">{{ $cat->products_count }} {{ Str::plural('product', $cat->products_count) }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonial / Social Proof --}}
<section class="py-20 bg-amber-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <svg class="w-12 h-12 text-amber-400 mx-auto mb-6 opacity-60" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
        <blockquote class="text-2xl md:text-3xl font-light leading-relaxed mb-8" style="font-family: 'Playfair Display', serif;">
            My clients <em>always</em> post the Welcome Home Box on Instagram. I've gotten three referrals just from people seeing those cookies on social media. Best marketing spend in my business.
        </blockquote>
        <div style="font-family: 'Inter', sans-serif;">
            <p class="font-semibold text-amber-200">Amanda Rodriguez</p>
            <p class="text-amber-400 text-sm">Top Producer, Keller Williams Birmingham</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">Ready to Sweeten Your Closings?</h2>
        <p class="text-stone-500 max-w-xl mx-auto mb-8" style="font-family: 'Inter', sans-serif;">Join hundreds of real estate professionals who use Sweet Closings to build lasting client relationships. First order ships free.</p>
        <a href="{{ route('shop') }}" class="inline-flex items-center px-10 py-4 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition shadow-lg" style="font-family: 'Inter', sans-serif;">
            Browse Our Collection
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>
@endsection
