<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Truy vấn đơn hàng có trạng thái "pending" và sắp xếp theo thời gian mới nhất
        $pendingOrders = Order::with(['user', 'details.product'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        // Truy vấn đơn hàng có trạng thái "success" và sắp xếp theo thời gian mới nhất
        $successOrders = Order::with(['user', 'details.product'])
            ->where('status', 'success')
            ->orderBy('created_at', 'desc')
            ->get();


        // Trả về view kèm theo hai danh sách đơn hàng
        return view('admin.order.index', [
            'title' => 'Danh sách đơn hàng',
            'pendingOrders' => $pendingOrders,
            'successOrders' => $successOrders,
        ]);
    }
    public function ordersDelete()
    {
        $ordersDelete = Order::with(['user', 'details.product'])
            ->where('status', 'cancel')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.order.ordersDelete', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $ordersDelete,
        ]);
    }


    public function view($id)
    {
        // Truy vấn đơn hàng theo ID, kèm theo thông tin khách hàng và chi tiết đơn hàng
        $order = Order::with(['user', 'admin', 'details.product'])->find($id);

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
    // app/Http/Controllers/OrderController.php

    public function orderSuccess(Request $request, $id)
    {
        // Truy vấn đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra nếu đơn hàng không tồn tại
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Đơn hàng không tồn tại.'
            ], 404);
        }

        // Cập nhật trạng thái đơn hàng thành 'success'
        $order->status = 'success';
        $order->save();

        // Trả về thông báo thành công
        return response()->json([
            'success' => true,
            'message' => 'Đơn hàng đã được cập nhật thành công.'
        ]);
    }

    public function cancel($id)
    {
        // Truy vấn đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra nếu đơn hàng không tồn tại
        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại.'], 404);
        }

        $orderDetails = $order->details;
        foreach($orderDetails as $detail){

            //điều chỉnh số lượng - hủy
            $product = Product::find($detail->productID);
                if ($product) {
                    $product->stock =  $product->stock + (int)$detail->quantity;
                    $product->save();
                }
        }


        // Cập nhật trạng thái đơn hàng thành 'cancel'
        $order->status = 'cancel';
        $order->save();

        // Trả về thông báo thành công
        return response()->json(['success' => true, 'message' => 'Đơn hàng đã được hủy.']);
    }

    public function edit($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }

        // Trả về thông tin đơn hàng dưới dạng JSON
        return response()->json([
            'id' => $order->id,
            'address' => $order->address,
        ]);
    }

    // Phương thức để cập nhật địa chỉ đơn hàng
    public function update(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }

        // Chỉ cập nhật địa chỉ của đơn hàng
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        // Cập nhật địa chỉ
        $order->address = $request->address;
        $order->save();

        // Trả về phản hồi JSON sau khi cập nhật thành công
        return response()->json(['message' => 'Cập nhật thành công']);
    }
}
