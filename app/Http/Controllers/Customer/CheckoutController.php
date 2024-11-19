<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart');
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }
        $cartTotal = format_currencyVNĐ($cartTotal);
        return view('customer.checkout.index', data: [
            'cart' => $cart,
            'cartTotal' => $cartTotal
        ]);
    }
    public function checkout(Request $request)
    {
        DB::beginTransaction(); // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
        try {
            $cart = session()->get('cart', []);

            // Nếu giỏ hàng rỗng
            if (empty($cart)) {
                return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
            }

            // Lấy thông tin user hiện tại
            $customerID = Auth::id(); // ID của người dùng đang đăng nhập (khách hàng)
            $adminID = 1; // Hard code ID của admin đặt hàng thay

            // Nếu là admin đặt hàng thay
            if (Auth::user()->role === 'admin') {
                $customerID = $request->input('customerID'); // ID khách hàng admin đang đặt hàng thay
                $adminID = Auth::id(); // Lưu ID của admin đặt hàng thay
            }

            // Tính tổng số lượng và tổng tiền của giỏ hàng
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
            $totalPrice = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            // Tạo đơn hàng mới
            $order = new Order();
            $order->customerID = $customerID;
            $order->adminID = $adminID;
            $order->address = $request->input('address');
            $order->totalQuantity = $totalQuantity;
            $order->totalPrice = $totalPrice;
            $order->note = $request->input('note');
            $order->paymentMethod = $request->input('paymentMethod');
            $order->status = 'pending'; // Trạng thái mặc định là 'pending'
            $order->save();

            // Lưu chi tiết đơn hàng
            foreach ($cart as $id => $item) {
                $orderDetail = new Order_Detail();
                $orderDetail->orderID = $order->id;
                $orderDetail->productID = $id;
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->price = $item['price'];
                $orderDetail->save();
                
                //điều chỉnh số lượng
                $product = Product::find($id);
                if ($product) {
                    $product->stock =  $product->stock - (int)$item['quantity'];
                    $product->save();
                }
            }

            // Xóa giỏ hàng sau khi hoàn thành đặt hàng
            session()->forget('cart');
            // Đặt lại tổng số lượng và tổng tiền
            session()->forget('totalQuantity');
            session()->forget('total');

            DB::commit(); // Commit transaction
            return redirect()->route('customer.order')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback nếu có lỗi xảy ra
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.');
        }
    }
}
