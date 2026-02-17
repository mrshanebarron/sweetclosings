<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'revenue' => Order::whereIn('status', ['processing', 'shipped', 'delivered'])->sum('total'),
            'total_products' => Product::count(),
        ];

        $recentOrders = Order::with('items')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
