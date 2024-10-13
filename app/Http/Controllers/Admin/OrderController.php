<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function placeOrder(Request $request)
    {
        $userId = Auth::id(); // ID của người dùng hiện tại (có thể là admin hoặc customer)

        $isAdmin = Auth::user()->hasRole("admin"); // Giả sử bạn có phương thức kiểm tra xem user có phải admin không
        $customerId = $request->input('customer_id'); // ID của khách hàng (nếu admin đặt giúp)

        // Tạo đơn hàng
        $order = new Order();

        if ($isAdmin) {
            $order->usersID = $customerId; // Customer ID (nếu admin đặt giúp)
            $order->adminID = $userId;     // Admin ID (người đặt đơn)
        } else {
            $order->usersID = $userId;     // Nếu customer tự đặt
            $order->adminID = null;
        }

        // Các thông tin khác về đơn hàng
        $order->address = $request->input('address');
        $order->totalQuantity = $request->input('totalQuantity');
        $order->orderDate = now();
        $order->totalPrice = $request->input('totalPrice');
        $order->status = 'pending';
        $order->note = $request->input('note');

        $order->save();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo.');
    }
}
