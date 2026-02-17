@extends('layouts.admin')
@section('title', 'Dashboard')

@section('breadcrumb')
    <h1 class="text-lg font-semibold text-stone-900">Dashboard</h1>
@endsection

@section('content')
    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-stone-500">Total Orders</span>
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-stone-900">{{ number_format($stats['total_orders']) }}</p>
        </div>
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-stone-500">Pending Orders</span>
                <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-stone-900">{{ number_format($stats['pending_orders']) }}</p>
        </div>
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-stone-500">Revenue</span>
                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-stone-900">${{ number_format($stats['revenue'], 2) }}</p>
        </div>
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-stone-500">Products</span>
                <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-stone-900">{{ number_format($stats['total_products']) }}</p>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="bg-white rounded-xl border border-stone-200">
        <div class="px-6 py-4 border-b border-stone-200 flex items-center justify-between">
            <h2 class="font-semibold text-stone-900">Recent Orders</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-amber-800 hover:text-amber-900 font-medium">View all</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-stone-100">
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Order</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Customer</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Items</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Total</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Status</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($recentOrders as $order)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.orders.show', $order) }}" class="font-medium text-amber-800 hover:text-amber-900">{{ $order->order_number }}</a>
                            </td>
                            <td class="px-6 py-4 text-stone-600">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $order->items->count() }}</td>
                            <td class="px-6 py-4 font-medium text-stone-900">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->status_color }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-500">{{ $order->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-stone-400">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
