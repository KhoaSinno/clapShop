<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        };
        // Lấy ID của customer hiện tại (người đang đăng nhập)
        $customerID = Auth::id();

        // Truy vấn lấy ra các đơn hàng thuộc về customer này
        $orders = Order::where('customerID', $customerID)
            ->with('details')
            ->orderBy('created_at', 'desc')
            ->get();


        // Trả về view và truyền các đơn hàng vào
        return view('customer.order.index', [
            'title' => 'Đơn hàng của bạn',
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Order::with('details')->findOrFail($id);

        return view('customer.order.detail', [
            'title' => 'Chi tiết đơn hàng',
            'order' => $order,
        ]);
    }
}
