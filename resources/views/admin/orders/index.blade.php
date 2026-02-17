@extends('layouts.admin')
@section('title', 'Orders')

@section('breadcrumb')
    <h1 class="text-lg font-semibold text-stone-900">Orders</h1>
@endsection

@section('content')
    {{-- Filters --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.orders.index') }}"
           class="px-4 py-2 rounded-lg text-sm font-medium transition {{ !request('status') ? 'bg-amber-800 text-white' : 'bg-white border border-stone-200 text-stone-600 hover:bg-stone-50' }}">
            All
        </a>
        @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
            <a href="{{ route('admin.orders.index', ['status' => $status]) }}"
               class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request('status') === $status ? 'bg-amber-800 text-white' : 'bg-white border border-stone-200 text-stone-600 hover:bg-stone-50' }}">
                {{ ucfirst($status) }}
            </a>
        @endforeach
    </div>

    {{-- Orders Table --}}
    <div class="bg-white rounded-xl border border-stone-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-stone-200">
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Order</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Customer</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Items</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Total</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Status</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Date</th>
                        <th class="text-right px-6 py-3 font-medium text-stone-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($orders as $order)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.orders.show', $order) }}" class="font-medium text-amber-800 hover:text-amber-900">{{ $order->order_number }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-stone-900">{{ $order->customer_name }}</div>
                                <div class="text-stone-500 text-xs">{{ $order->customer_email }}</div>
                            </td>
                            <td class="px-6 py-4 text-stone-600">{{ $order->items->count() }} item{{ $order->items->count() !== 1 ? 's' : '' }}</td>
                            <td class="px-6 py-4 font-medium text-stone-900">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->status_color }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-500">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-amber-800 hover:text-amber-900 font-medium">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-stone-400">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->hasPages())
            <div class="px-6 py-4 border-t border-stone-200">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection
