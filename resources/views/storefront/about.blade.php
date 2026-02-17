@extends('layouts.storefront')
@section('title', 'About Us — Sweet Closings')

@section('content')
<section class="py-16 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">Our Story</h1>
            <p class="text-stone-500 max-w-2xl mx-auto leading-relaxed">Born from a simple idea: the best business relationships are built on genuine thoughtfulness, not just transactions.</p>
        </div>

        <div class="prose prose-stone max-w-none">
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <img src="https://images.unsplash.com/photo-1556217477-d325251ece38?w=800&q=80" alt="Baker decorating cookies" class="rounded-xl shadow-md">
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">From Kitchen Table to Your Client's Doorstep</h2>
                    <p class="text-stone-600 leading-relaxed mb-4">Sweet Closings started when a Birmingham real estate agent asked a local baker to make house-shaped cookies for a closing. The client posted them on Instagram. Three agents called the next day asking for the same thing.</p>
                    <p class="text-stone-600 leading-relaxed">That was 2023. Today, we serve over 500 real estate professionals across Alabama and the Southeast, hand-crafting every cookie in our Birmingham kitchen with locally sourced ingredients and genuine care.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-stone-50 rounded-xl p-6 border border-stone-200 text-center">
                    <div class="w-12 h-12 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-900 mb-2">Made With Love</h3>
                    <p class="text-sm text-stone-500">Every cookie is hand-decorated by our team of artisan bakers. No shortcuts, no mass production.</p>
                </div>
                <div class="bg-stone-50 rounded-xl p-6 border border-stone-200 text-center">
                    <div class="w-12 h-12 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-900 mb-2">Locally Sourced</h3>
                    <p class="text-sm text-stone-500">We use local butter, eggs, and flour from Alabama farms. Supporting our community is part of who we are.</p>
                </div>
                <div class="bg-stone-50 rounded-xl p-6 border border-stone-200 text-center">
                    <div class="w-12 h-12 bg-amber-100 text-amber-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-900 mb-2">Built for Agents</h3>
                    <p class="text-sm text-stone-500">We understand your business. Our gifts are designed to strengthen client relationships and generate referrals.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
