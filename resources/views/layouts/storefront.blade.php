<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sweet Closings — Artisan Gifting for Real Estate Professionals')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700,800,900|inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900">
    {{-- Announcement Bar --}}
    <div class="bg-amber-900 text-amber-50 text-center text-sm py-2 font-medium tracking-wide" style="font-family: 'Inter', sans-serif;">
        Free shipping on orders over $75 &nbsp;&middot;&nbsp; Handcrafted in Birmingham, AL
    </div>

    {{-- Navigation --}}
    <nav x-data="{ open: false }" class="bg-white border-b border-stone-200 sticky top-0 z-50" style="font-family: 'Inter', sans-serif;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-amber-800 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-100" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold tracking-tight text-stone-900" style="font-family: 'Playfair Display', serif;">Sweet Closings</span>
                        <span class="block text-xs text-stone-500 -mt-1 tracking-widest uppercase">Artisan Gifting</span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('shop') }}" class="text-sm font-medium text-stone-600 hover:text-amber-800 transition">Shop All</a>
                    @foreach(\App\Models\Category::active()->ordered()->get() as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="text-sm font-medium text-stone-600 hover:text-amber-800 transition">{{ $cat->name }}</a>
                    @endforeach
                </div>

                {{-- Cart --}}
                <div class="flex items-center gap-4">
                    <a href="{{ route('cart') }}" class="relative text-stone-600 hover:text-amber-800 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        @php $cartCount = session('cart_count', 0); @endphp
                        @if($cartCount > 0)
                            <span class="absolute -top-2 -right-2 bg-amber-800 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center font-bold">{{ $cartCount }}</span>
                        @endif
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-stone-600 hover:text-amber-800">Admin</a>
                    @endauth
                    {{-- Mobile menu toggle --}}
                    <button @click="open = !open" class="md:hidden text-stone-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="open" x-cloak x-transition class="md:hidden border-t border-stone-200 bg-white">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('shop') }}" class="block text-sm font-medium text-stone-700">Shop All</a>
                @foreach(\App\Models\Category::active()->ordered()->get() as $cat)
                    <a href="{{ route('shop.category', $cat->slug) }}" class="block text-sm font-medium text-stone-700">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-50 border-b border-green-200 px-4 py-3 text-center text-sm text-green-800 font-medium">
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-stone-900 text-stone-300 mt-20" style="font-family: 'Inter', sans-serif;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <h3 class="text-2xl font-bold text-white mb-3" style="font-family: 'Playfair Display', serif;">Sweet Closings</h3>
                    <p class="text-stone-400 leading-relaxed max-w-md">Handcrafted cookies and edible gifts designed specifically for real estate professionals. Make every closing memorable, every referral appreciated, every client relationship sweeter.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4 uppercase text-xs tracking-widest">Shop</h4>
                    <ul class="space-y-2 text-sm">
                        @foreach(\App\Models\Category::active()->ordered()->get() as $cat)
                            <li><a href="{{ route('shop.category', $cat->slug) }}" class="hover:text-amber-400 transition">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4 uppercase text-xs tracking-widest">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-amber-400 transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-400 transition">Contact</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-amber-400 transition">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-stone-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-stone-500">&copy; {{ date('Y') }} Sweet Closings. All rights reserved.</p>
                <p class="text-sm text-stone-500">Handcrafted in Birmingham, Alabama</p>
            </div>
        </div>
    </footer>
</body>
</html>
