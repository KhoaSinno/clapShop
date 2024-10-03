<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin.order.index', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $orders,
        ]);
    }
}
