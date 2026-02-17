@extends('layouts.storefront')
@section('title', 'FAQ — Sweet Closings')

@section('content')
<section class="py-16 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">Frequently Asked Questions</h1>
            <p class="text-stone-500">Everything you need to know about ordering with Sweet Closings.</p>
        </div>

        <div class="space-y-4" x-data="{ open: null }">
            @php
                $faqs = [
                    ['q' => 'How far in advance should I order?', 'a' => 'Standard orders need 3-5 business days. Custom logo cookies and personalized designs need 5-7 business days. Rush orders (2 business days) are available for a $15 fee on select items.'],
                    ['q' => 'Can I add my brokerage logo to the cookies?', 'a' => 'Absolutely! Upload your logo during checkout for our Custom Logo Cookies, or add branded ribbons and stickers to any gift box. We\'ll send a digital proof within 24 hours for your approval.'],
                    ['q' => 'Do you ship nationwide?', 'a' => 'We currently ship throughout the Southeast (AL, TN, GA, MS, FL, SC, NC). We\'re expanding nationwide in 2026. For orders outside our delivery area, contact us for special arrangements.'],
                    ['q' => 'What about allergies and dietary restrictions?', 'a' => 'Each product lists its allergens. Most cookies contain wheat, eggs, and dairy. We offer a limited selection of gluten-free and vegan options — call us for availability. Note: all cookies are made in a facility that processes tree nuts and peanuts.'],
                    ['q' => 'How long do the cookies stay fresh?', 'a' => 'Our cookies stay fresh for 7-10 days when stored in their packaging at room temperature. We recommend gifting within 5 days of delivery for peak freshness. Do not refrigerate.'],
                    ['q' => 'Do you offer bulk or corporate pricing?', 'a' => 'Yes! Orders of 10+ gifts per month qualify for our corporate discount (10-15% off). We also offer dedicated account management, auto-shipping schedules, and branded packaging for high-volume agents and brokerages.'],
                    ['q' => 'Can I include a gift message?', 'a' => 'Every order includes a free handwritten gift card. During checkout, you can add a personalized message up to 500 characters. We can also include your business card if you mail them to us in advance.'],
                    ['q' => 'What is your return/refund policy?', 'a' => 'Because our products are perishable and made to order, we cannot accept returns. However, if your order arrives damaged or doesn\'t meet your expectations, contact us within 48 hours and we\'ll make it right — guaranteed.'],
                ];
            @endphp

            @foreach($faqs as $i => $faq)
                <div class="border border-stone-200 rounded-lg overflow-hidden">
                    <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="flex items-center justify-between w-full px-6 py-4 text-left font-medium text-stone-900 hover:bg-stone-50 transition">
                        <span>{{ $faq['q'] }}</span>
                        <svg class="w-5 h-5 text-stone-400 transition flex-shrink-0 ml-4" :class="open === {{ $i }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open === {{ $i }}" x-cloak x-collapse>
                        <div class="px-6 pb-4 text-sm text-stone-600 leading-relaxed">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <p class="text-stone-500 mb-4">Still have questions?</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
