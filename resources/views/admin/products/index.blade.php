@extends('layouts.admin')
@section('title', 'Products')

@section('breadcrumb')
    <h1 class="text-lg font-semibold text-stone-900">Products</h1>
@endsection

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-stone-500">{{ $products->total() }} product{{ $products->total() !== 1 ? 's' : '' }}</p>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-800 hover:bg-amber-900 text-white text-sm font-medium rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Product
        </a>
    </div>

    <div class="bg-white rounded-xl border border-stone-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-stone-200">
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Product</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Category</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Price</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">SKU</th>
                        <th class="text-left px-6 py-3 font-medium text-stone-500">Status</th>
                        <th class="text-right px-6 py-3 font-medium text-stone-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($products as $product)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg object-cover bg-stone-100">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-stone-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-stone-900">{{ $product->name }}</p>
                                        @if($product->is_featured)
                                            <span class="text-xs text-amber-700 font-medium">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-stone-600">{{ $product->category->name }}</td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-stone-900">${{ number_format($product->price, 2) }}</span>
                                @if($product->compare_price)
                                    <span class="text-xs text-stone-400 line-through ml-1">${{ number_format($product->compare_price, 2) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-stone-500 font-mono text-xs">{{ $product->sku ?: '—' }}</td>
                            <td class="px-6 py-4">
                                @if($product->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-stone-100 text-stone-500">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-amber-800 hover:text-amber-900 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-stone-400">No products yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-stone-200">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
