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
    // Truy vấn đơn hàng có trạng thái "pending"
    $pendingOrders = Order::with(['user', 'details.product'])
                          ->where('status', 'pending')
                          ->get();

    // Truy vấn đơn hàng có trạng thái "success"
    $successOrders = Order::with(['user', 'details.product'])
                          ->where('status', 'success')
                          ->get();

    // Trả về view kèm theo hai danh sách đơn hàng
    return view('admin.order.index', [
        'title' => 'Danh sách đơn hàng',
        'pendingOrders' => $pendingOrders,
        'successOrders' => $successOrders,
    ]);
}


    public function view($id)
    {
        // Truy vấn đơn hàng theo ID, kèm theo thông tin khách hàng và chi tiết đơn hàng
        $order = Order::with(['user', 'details.product'])->find($id);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$order) {
            return redirect()->route('admin.order.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        return view('admin.order.detail', [
            'title' => 'Chi tiết đơn hàng',
            'order' => $order,
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
