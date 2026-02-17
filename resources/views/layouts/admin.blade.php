<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Sweet Closings</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="antialiased bg-stone-100 text-stone-900" style="font-family: 'Inter', sans-serif;">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-stone-900 text-stone-300 flex-shrink-0 hidden lg:flex lg:flex-col">
            <div class="px-6 py-5 border-b border-stone-800">
                <a href="{{ route('home') }}" class="text-lg font-bold text-white tracking-tight">Sweet Closings</a>
                <span class="block text-xs text-stone-500 tracking-widest uppercase">Admin Panel</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-800/20 text-amber-400' : 'hover:bg-stone-800 text-stone-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.orders.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.orders.*') ? 'bg-amber-800/20 text-amber-400' : 'hover:bg-stone-800 text-stone-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Orders
                    @php $pendingCount = \App\Models\Order::where('status', 'pending')->count(); @endphp
                    @if($pendingCount > 0)
                        <span class="ml-auto bg-amber-600 text-white text-xs px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.products.*') ? 'bg-amber-800/20 text-amber-400' : 'hover:bg-stone-800 text-stone-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Products
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-stone-800">
                <div class="flex items-center gap-3 px-3">
                    <div class="w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center text-amber-100 text-xs font-bold">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-stone-300 truncate">{{ auth()->user()->name }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-stone-500 hover:text-stone-300 transition" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Top bar (mobile sidebar toggle + breadcrumb) --}}
            <header class="bg-white border-b border-stone-200 px-6 py-4 flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm text-stone-500 hover:text-amber-800 transition lg:hidden font-semibold">Sweet Closings</a>
                <div class="hidden lg:block">
                    @yield('breadcrumb')
                </div>
                <div class="ml-auto flex items-center gap-3">
                    <a href="{{ route('home') }}" class="text-sm text-stone-500 hover:text-amber-800 transition">View Store</a>
                </div>
            </header>

            {{-- Flash --}}
            @if(session('success'))
                <div class="bg-green-50 border-b border-green-200 px-6 py-3 text-sm text-green-800 font-medium">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
