@extends('layouts.admin')
@section('title', 'Order ' . $order->order_number)

@section('breadcrumb')
    <div class="flex items-center gap-2 text-sm">
        <a href="{{ route('admin.orders.index') }}" class="text-stone-500 hover:text-stone-700">Orders</a>
        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="font-semibold text-stone-900">{{ $order->order_number }}</span>
    </div>
@endsection

@section('content')
    <div class="grid lg:grid-cols-3 gap-6">
        {{-- Order Details --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Items --}}
            <div class="bg-white rounded-xl border border-stone-200">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="font-semibold text-stone-900">Order Items</h2>
                </div>
                <div class="divide-y divide-stone-100">
                    @foreach($order->items as $item)
                        <div class="px-6 py-4 flex items-center gap-4">
                            @if($item->product && $item->product->image)
                                <img src="{{ $item->product->image }}" alt="{{ $item->product_name }}" class="w-16 h-16 rounded-lg object-cover bg-stone-100">
                            @else
                                <div class="w-16 h-16 rounded-lg bg-stone-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-stone-900">{{ $item->product_name }}</p>
                                <p class="text-sm text-stone-500">Qty: {{ $item->quantity }} &times; ${{ number_format($item->price, 2) }}</p>
                            </div>
                            <p class="font-medium text-stone-900">${{ number_format($item->line_total, 2) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 border-t border-stone-200 space-y-2">
                    <div class="flex justify-between text-sm text-stone-600">
                        <span>Subtotal</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-stone-600">
                        <span>Shipping</span>
                        <span>${{ number_format($order->shipping, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-stone-600">
                        <span>Tax</span>
                        <span>${{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="flex justify-between font-semibold text-stone-900 pt-2 border-t border-stone-100">
                        <span>Total</span>
                        <span>${{ number_format($order->total, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Gift Message --}}
            @if($order->giftMessage)
                <div class="bg-white rounded-xl border border-stone-200">
                    <div class="px-6 py-4 border-b border-stone-200">
                        <h2 class="font-semibold text-stone-900">Gift Message</h2>
                    </div>
                    <div class="px-6 py-4 space-y-2">
                        <div class="flex gap-8 text-sm">
                            <div>
                                <span class="text-stone-500">From:</span>
                                <span class="font-medium text-stone-900 ml-1">{{ $order->giftMessage->sender_name }}</span>
                            </div>
                            <div>
                                <span class="text-stone-500">To:</span>
                                <span class="font-medium text-stone-900 ml-1">{{ $order->giftMessage->recipient_name }}</span>
                            </div>
                            @if($order->giftMessage->occasion)
                                <div>
                                    <span class="text-stone-500">Occasion:</span>
                                    <span class="font-medium text-stone-900 ml-1">{{ $order->giftMessage->occasion }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 text-sm text-amber-900 italic">
                            &ldquo;{{ $order->giftMessage->message }}&rdquo;
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Status --}}
            <div class="bg-white rounded-xl border border-stone-200">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="font-semibold text-stone-900">Status</h2>
                </div>
                <div class="px-6 py-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $order->status_color }}">
                        {{ ucfirst($order->status) }}
                    </span>
                    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="mt-4 space-y-3">
                        @csrf
                        @method('PUT')
                        <select name="status" class="w-full border-stone-300 rounded-lg text-sm focus:ring-amber-500 focus:border-amber-500">
                            @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $s)
                                <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="w-full py-2 bg-amber-800 hover:bg-amber-900 text-white text-sm font-medium rounded-lg transition">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>

            {{-- Customer --}}
            <div class="bg-white rounded-xl border border-stone-200">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="font-semibold text-stone-900">Customer</h2>
                </div>
                <div class="px-6 py-4 space-y-3 text-sm">
                    <div>
                        <span class="text-stone-500">Name</span>
                        <p class="font-medium text-stone-900">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <span class="text-stone-500">Email</span>
                        <p class="font-medium text-stone-900">{{ $order->customer_email }}</p>
                    </div>
                    @if($order->customer_phone)
                        <div>
                            <span class="text-stone-500">Phone</span>
                            <p class="font-medium text-stone-900">{{ $order->customer_phone }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Shipping --}}
            <div class="bg-white rounded-xl border border-stone-200">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="font-semibold text-stone-900">Shipping Address</h2>
                </div>
                <div class="px-6 py-4 text-sm text-stone-700 leading-relaxed">
                    {{ $order->shipping_address }}<br>
                    {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}
                </div>
            </div>

            {{-- Timeline --}}
            <div class="bg-white rounded-xl border border-stone-200">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="font-semibold text-stone-900">Timeline</h2>
                </div>
                <div class="px-6 py-4 space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-stone-500">Placed</span>
                        <span class="text-stone-900">{{ $order->created_at->format('M d, Y g:ia') }}</span>
                    </div>
                    @if($order->shipped_at)
                        <div class="flex justify-between">
                            <span class="text-stone-500">Shipped</span>
                            <span class="text-stone-900">{{ $order->shipped_at->format('M d, Y g:ia') }}</span>
                        </div>
                    @endif
                    @if($order->delivered_at)
                        <div class="flex justify-between">
                            <span class="text-stone-500">Delivered</span>
                            <span class="text-stone-900">{{ $order->delivered_at->format('M d, Y g:ia') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
