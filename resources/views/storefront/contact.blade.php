@extends('layouts.storefront')
@section('title', 'Contact Us — Sweet Closings')

@section('content')
<section class="py-16 bg-white" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-stone-900 mb-4" style="font-family: 'Playfair Display', serif;">Get in Touch</h1>
            <p class="text-stone-500 max-w-xl mx-auto">Questions about bulk orders, custom branding, or anything else? We'd love to hear from you.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                        <input type="text" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Email</label>
                        <input type="email" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Subject</label>
                        <select class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500">
                            <option>General Inquiry</option>
                            <option>Bulk / Corporate Orders</option>
                            <option>Custom Branding</option>
                            <option>Order Status</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Message</label>
                        <textarea rows="5" class="w-full border-stone-300 rounded focus:ring-amber-500 focus:border-amber-500"></textarea>
                    </div>
                    <button type="button" onclick="alert('Demo mode — contact form not connected.')" class="w-full py-3 bg-amber-800 hover:bg-amber-900 text-white font-semibold rounded transition">
                        Send Message
                    </button>
                </form>
            </div>
            <div class="space-y-8">
                <div>
                    <h3 class="font-semibold text-stone-900 mb-2">Email Us</h3>
                    <p class="text-stone-600">hello@sweetclosings.com</p>
                </div>
                <div>
                    <h3 class="font-semibold text-stone-900 mb-2">Call Us</h3>
                    <p class="text-stone-600">(205) 555-BAKE</p>
                    <p class="text-sm text-stone-500">Monday — Friday, 9am — 5pm CST</p>
                </div>
                <div>
                    <h3 class="font-semibold text-stone-900 mb-2">Visit Our Kitchen</h3>
                    <p class="text-stone-600">2847 Cahaba Road</p>
                    <p class="text-stone-600">Birmingham, AL 35223</p>
                    <p class="text-sm text-stone-500 mt-1">By appointment only</p>
                </div>
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                    <h3 class="font-semibold text-amber-900 mb-1">Corporate Accounts</h3>
                    <p class="text-sm text-amber-800">Order 10+ gifts per month? Ask about our corporate discount program with dedicated account management.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
