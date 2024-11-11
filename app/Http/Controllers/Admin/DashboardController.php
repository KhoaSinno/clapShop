<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $lowStockProducts = Product::where('stock', '<=', 5)->count(); // Assuming 5 is the low stock threshold

        $orders = Order::latest()->take(10)->get(); // Fetch the latest 10 orders
        $customers = User::where('role', 'customer')->latest()->take(10)->get(); // Fetch the latest 10 customers with role 'customer'

        return view('admin.dashboard', compact('totalCustomers', 'totalProducts', 'totalOrders', 'lowStockProducts', 'orders', 'customers'));
    }
}