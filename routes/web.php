<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

// Storefront
Route::get('/', [StorefrontController::class, 'home'])->name('home');
Route::get('/shop', [StorefrontController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [StorefrontController::class, 'category'])->name('shop.category');
Route::get('/product/{slug}', [StorefrontController::class, 'product'])->name('product');
Route::get('/about', [StorefrontController::class, 'about'])->name('about');
Route::get('/contact', [StorefrontController::class, 'contact'])->name('contact');
Route::get('/faq', [StorefrontController::class, 'faq'])->name('faq');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/{orderNumber}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');

// Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
