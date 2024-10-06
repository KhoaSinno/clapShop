<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');

        return view('customer.cart.index', compact('cart'));
    }

    public function addToCart($id, Request $request)
    {
        // Tìm sản phẩm trong cơ sở dữ liệu
        $product = Product::find($id);

        // Kiểm tra xem sản phẩm có tồn tại hay không
        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại.'], 404);
        }

        // Lấy giỏ hàng từ session, nếu chưa có thì khởi tạo một mảng rỗng
        $cart = Session::get('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu có, tăng số lượng sản phẩm
            $cart[$id]['quantity']++;
        } else {
            // Nếu chưa có, thêm sản phẩm vào giỏ hàng
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image // Nếu có trường hình ảnh
            ];
        }

        // Cập nhật giỏ hàng vào session
        Session::put('cart', $cart);

        // Trả về phản hồi thành công
        return response()->json(['success' => 'Sản phẩm đã được thêm vào giỏ hàng!']);
    }
    public function getCartItemCount()
    {
        // Giả sử bạn lưu trữ giỏ hàng trong session với khóa 'cart'
        $cart = session()->get('cart', []);

        // Tính số lượng sản phẩm trong giỏ hàng
        $itemCount = 0;
        foreach ($cart as $item) {
            $itemCount += $item['quantity']; // Hoặc có thể tính theo cách khác tùy vào cấu trúc của giỏ hàng
        }

        return $itemCount; // Trả về số lượng sản phẩm
    }
    public function removeFromCart($id)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$id]);
            // Cập nhật giỏ hàng trong session
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}
