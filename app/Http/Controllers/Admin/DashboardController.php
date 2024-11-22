<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        // Fetch sales data for the past 6 months
        $salesData = Order::select(
            DB::raw('SUM(totalPrice) as total'),
            DB::raw('MONTH(created_at) as month')
        )
        ->where('created_at', '>=', Carbon::now()->subMonths(7))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Fetch customer data for the past 6 months
        $customerData = User::select(
            DB::raw('COUNT(*) as total'),
            DB::raw('MONTH(created_at) as month')
        )
        ->where('role', 'customer')
        ->where('created_at', '>=', Carbon::now()->subMonths(7))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Fetch oder data for the past 6 months
        $ordersData = Order::select(
            DB::raw('COUNT(*) as total'),
            DB::raw('MONTH(created_at) as month')
        )
        ->where('created_at', '>=', Carbon::now()->subMonths(7))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        return view('admin.dashboard', compact('totalCustomers', 'totalProducts', 'totalOrders', 'lowStockProducts', 'orders', 'customers', 'salesData', 'customerData', 'ordersData'));
    }
}
