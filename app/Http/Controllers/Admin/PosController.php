<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $cart = session()->get('cart', []);
        return view('admin.pos.index', [
            'title' => 'POS Bán hàng',
            'products' => $products,
            'cart' => $cart
        ]);
    }

    public function addProductSession($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại!'
            ], 404); // Trả về lỗi nếu sản phẩm không tồn tại
        }

        // Lấy giỏ hàng từ session, nếu chưa có thì khởi tạo mảng rỗng
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
                "image" => $product->mainImage ? $product->mainImage->image_url : asset('storage/images/default.jpg')
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        // Tính tổng tiền và tổng số lượng
        $total = 0;
        $totalQuantity = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $totalQuantity += $item['quantity'];
        }

        // Cập nhật tổng tiền và tổng số lượng vào session
        session()->put('total', $total);
        session()->put('totalQuantity', $totalQuantity);

        // Trả về dữ liệu JSON để cập nhật giao diện
        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'cart' => $cart, // Gửi lại giỏ hàng để hiển thị
            'total' => $total,
            'totalQuantity' => $totalQuantity
        ]);
    }


    public function searchProduct(Request $request)
    {
        $query = $request->get('query');

        // Tìm kiếm sản phẩm theo tên hoặc mã hàng
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('id', 'LIKE', "%{$query}%")
            ->get();

        // Tạo chuỗi HTML để trả về
        $output = '';

        if ($products->count() > 0) {
            foreach ($products as $product) {
                $output .= '
            <tr>
                <td>' . $product->id . '</td>
                <td>' . $product->name . '</td>
                 <td>
                <img src="' . ($product->mainImage ? asset($product->mainImage->image_url) : asset('storage/images/default.jpg')) . '" alt="' . $product->name . '" width="50px">
                 </td>
                  <td><input class="so--luong1" type="number" value="1" min="1" disabled>
                  </td>
                <td>' . number_format($product->price) . ' VND</td>
                <td class="text-center">
                    <a class="btn btn-success btn-sm add-to-cart text-white" data-id="' . $product->id . '">Thêm</a>
                </td>
            </tr>';
            }
        } else {
            $output = '<tr><td colspan="6">Không có sản phẩm nào được tìm thấy.</td></tr>';
        }

        // Trả về chuỗi HTML
        return $output;
    }

    // PosController.php

    public function removeProductFromSession($id)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$id]);

            // Cập nhật lại session
            session()->put('cart', $cart);

            // Tính toán lại tổng tiền và số lượng
            $total = array_sum(array_column($cart, 'price'));
            $totalQuantity = array_sum(array_column($cart, 'quantity'));

            // Trả về phản hồi AJAX
            return response()->json([
                'cart' => $cart,
                'total' => number_format($total, 0, ',', '.') . '₫',
                'totalQuantity' => $totalQuantity
            ]);
        }

        return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
    }
}
