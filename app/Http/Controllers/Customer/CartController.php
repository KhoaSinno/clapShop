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
        $cartTotal = 0;
        if (!$cart) {
            $cart = [];
        }
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }
        $cartTotal = format_currencyVNĐ($cartTotal);
        return view('customer.cart.index', [
            'cart' => $cart,
            'cartTotal' => $cartTotal
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Nếu chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                'image' => $product->mainImage->image_url

            ];
        }

        session()->put('cart', $cart);

        // Tính tổng tiền
        $total = 0;
        $totalQuantity = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            // Tính tổng số lượng sản phẩm
            $totalQuantity += $item['quantity'];
        }

        // Cập nhật tổng tiền vào session
        session()->put('total', $total);
        session()->put('totalQuantity', $totalQuantity);

        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'total' => $total,
            'totalQuantity' => $totalQuantity,
        ]);
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
    // public function removeFromCart($id)
    // {
    //     // Lấy giỏ hàng từ session
    //     $cart = session()->get('cart', []);

    //     // Kiểm tra xem sản phẩm có trong giỏ hàng không
    //     if (isset($cart[$id])) {
    //         // Xóa sản phẩm khỏi giỏ hàng
    //         unset($cart[$id]);
    //         // Cập nhật giỏ hàng trong session
    //         session()->put('cart', $cart);
    //     }

    //     return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    // }



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

            // Tính tổng tiền
            $total = 0;
            $totalQuantity = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
                // Tính tổng số lượng sản phẩm
                $totalQuantity += $item['quantity'];
            }

            // Cập nhật tổng tiền vào session
            session()->put('total', $total);
            session()->put('totalQuantity', $totalQuantity);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function update(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $cart[$request->id]['quantity'] = $request->quantity;

            // Cập nhật lại session giỏ hàng
            session()->put('cart', $cart);

            // Tính lại tổng giá sản phẩm
            $productTotal = $cart[$request->id]['price'] * $cart[$request->id]['quantity'];

            // Tính lại tổng giá của toàn bộ giỏ hàng
            $cartTotal = 0;
            foreach ($cart as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }
            $cartTotal = format_currencyVNĐ($cartTotal);
            $productTotal = format_currencyVNĐ($productTotal);

            // Trả về kết quả
            return response()->json([
                'productTotal' => $productTotal,
                'cartTotal' => $cartTotal
            ]);
        }

        return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
    }
}
