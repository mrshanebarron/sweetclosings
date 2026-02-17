@extends('layouts.admin')
@section('title', isset($product) ? 'Edit Product' : 'New Product')

@section('breadcrumb')
    <div class="flex items-center gap-2 text-sm">
        <a href="{{ route('admin.products.index') }}" class="text-stone-500 hover:text-stone-700">Products</a>
        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="font-semibold text-stone-900">{{ isset($product) ? $product->name : 'New Product' }}</span>
    </div>
@endsection

@section('content')
    <form method="POST"
          action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
          class="max-w-4xl">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="grid lg:grid-cols-3 gap-6">
            {{-- Main --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-4">
                    <h2 class="font-semibold text-stone-900">Product Details</h2>

                    <div>
                        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required
                               class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                        @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="short_description" class="block text-sm font-medium text-stone-700 mb-1">Short Description</label>
                        <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $product->short_description ?? '') }}" maxlength="500"
                               class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                        @error('short_description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Full Description</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Image URL</label>
                        <input type="url" name="image" id="image" value="{{ old('image', $product->image ?? '') }}"
                               class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                               placeholder="https://images.unsplash.com/...">
                        @error('image') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-4">
                    <h2 class="font-semibold text-stone-900">Pricing & Inventory</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-stone-700 mb-1">Price ($)</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" required
                                   class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                            @error('price') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="compare_price" class="block text-sm font-medium text-stone-700 mb-1">Compare Price ($)</label>
                            <input type="number" step="0.01" min="0" name="compare_price" id="compare_price" value="{{ old('compare_price', $product->compare_price ?? '') }}"
                                   class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                                   placeholder="Optional — shows as strikethrough">
                            @error('compare_price') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="sku" class="block text-sm font-medium text-stone-700 mb-1">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku ?? '') }}"
                                   class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 font-mono text-sm">
                            @error('sku') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="serves" class="block text-sm font-medium text-stone-700 mb-1">Serves</label>
                            <input type="number" min="1" name="serves" id="serves" value="{{ old('serves', $product->serves ?? '') }}"
                                   class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                            @error('serves') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="dietary_info" class="block text-sm font-medium text-stone-700 mb-1">Dietary Info</label>
                            <input type="text" name="dietary_info" id="dietary_info" value="{{ old('dietary_info', $product->dietary_info ?? '') }}"
                                   class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                                   placeholder="e.g. Contains nuts">
                            @error('dietary_info') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-stone-200 p-6 space-y-4">
                    <h2 class="font-semibold text-stone-900">Organization</h2>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-stone-700 mb-1">Category</label>
                        <select name="category_id" id="category_id" required
                                class="w-full border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                            <option value="">Select category...</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}
                               class="rounded border-stone-300 text-amber-800 focus:ring-amber-500">
                        <label for="is_featured" class="text-sm text-stone-700">Featured product</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                               {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                               class="rounded border-stone-300 text-amber-800 focus:ring-amber-500">
                        <label for="is_active" class="text-sm text-stone-700">Active (visible in store)</label>
                    </div>
                </div>

                {{-- Preview --}}
                @if(isset($product) && $product->image)
                    <div class="bg-white rounded-xl border border-stone-200 p-6">
                        <h2 class="font-semibold text-stone-900 mb-3">Preview</h2>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full rounded-lg object-cover">
                    </div>
                @endif

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 py-2.5 bg-amber-800 hover:bg-amber-900 text-white text-sm font-medium rounded-lg transition">
                        {{ isset($product) ? 'Update Product' : 'Create Product' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2.5 bg-white border border-stone-200 text-stone-600 text-sm font-medium rounded-lg hover:bg-stone-50 transition">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
