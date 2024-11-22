<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function addProductSession(Request $request, $id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Sản phẩm không tồn tại!'
            ], 404); // Trả về lỗi nếu sản phẩm không tồn tại
        }

        $productListQuantity = $request->input('productListQuantity', 1);

        // Lấy giỏ hàng từ session, nếu chưa có thì khởi tạo mảng rỗng
        $cart = session()->get('cart', []);

        ///////////////////////////////////////////////////////////////
        // Kiểm tra tồn kho
        // Nếu sản phẩm đã có trong giỏ, lấy số lượng hiện tại trong giỏ hàng
        $currentQuantityInCart = isset($cart[$id]) ? $cart[$id]['quantity'] : 0;

        // Nếu số lượng yêu cầu cộng số lượng trong giỏ hàng vượt quá tồn kho, trả về lỗi
        if ($product->stock < ($productListQuantity + $currentQuantityInCart)) {
            return response()->json([
                'error' => 'Số lượng yêu cầu vượt quá số lượng tồn kho!'
            ], 400); // Trả về lỗi nếu số lượng yêu cầu vượt quá tồn kho
        }
        //////////////////////////////////////////////////////////////


        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $productListQuantity;
        } else {
            // Nếu chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
            $cart[$id] = [
                "productID" => $product->id, // Thêm productID vào giỏ hàng
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $productListQuantity,
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
                  <td><input class="so--luong1 productList-quantity" type="number" value="1" min="1" data-id="' . $product->id . '">
                  </td>
                <td >' . number_format($product->price) . 'đ</td>
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

    public function checkCustomer(Request $request)
    {
        $phone = strval($request->input('phone'));
        // Tìm kiếm khách hàng có vai trò là 'customer' với số điện thoại đã nhập
        $customer = User::where('role', 'customer')->where('phone', $phone)->first();

        if ($customer) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
    public function addNewCustomer(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'fullname' => 'required|string|max:150',
            'phone' => 'required|string|max:20|unique:users,phone',
        ]);

        // Tạo khách hàng mới
        $customer = User::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'role' => 'customer',
            'email' => '',
            'address' => '',
            'gender' => '',
            'username' => $request->phone, // Lưu trường username
            'password' => Hash::make($request->phone), // Có thể thiết lập mật khẩu mặc định hoặc yêu cầu nhập
        ]);

        // Trả về phản hồi
        return response()->json(['success' => true, 'customer' => $customer]);
    }

    public function createOrder(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'customerPhone' => 'required',
            'address' => 'required',
            'paymentMethod' => 'required',
            'note' => 'nullable|string',
        ]);

        // Tìm khách hàng theo số điện thoại
        $customer = User::where('phone', $validated['customerPhone'])
            ->where('role', 'customer')
            ->first();

        if (!$customer) {
            return response()->json(['error' => 'Khách hàng không tồn tại'], 400);
        }

        // Lấy sản phẩm từ session (giỏ hàng)
        $cartItems = session('cart', []); // Mặc định là mảng rỗng nếu giỏ hàng trống

        // Nếu giỏ hàng trống, không tạo đơn hàng
        if (empty($cartItems)) {
            return response()->json(['error' => 'Giỏ hàng rỗng'], 400);
        }

        // Tính tổng số lượng và tổng giá trị của giỏ hàng
        $totalQuantity = array_sum(array_column($cartItems, 'quantity'));
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $cartItems));

        // Tạo đơn hàng trong một transaction để đảm bảo tính toàn vẹn
        DB::beginTransaction();

        try {
            // Tạo đơn hàng
            $order = Order::create([
                'customerID' => $customer->id,
                'adminID' => auth()->user()->id, // ID của admin tạo đơn
                'address' => $validated['address'],
                'totalQuantity' => $totalQuantity,
                'totalPrice' => $totalPrice,
                'note' => $validated['note'] ?? null, // Ghi chú có thể rỗng
                'paymentMethod' => $validated['paymentMethod'],
                'status' => 'success', // Trạng thái mặc định
            ]);

            // Lưu chi tiết đơn hàng
            foreach ($cartItems as $item) {
                // Kiểm tra xem khóa 'productID' có tồn tại không
                if (!isset($item['productID'])) {
                    return response()->json(['error' => 'Thiếu productID trong giỏ hàng'], 400);
                }

                Order_Detail::create([
                    'orderID' => $order->id,
                    'productID' => $item['productID'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                //điều chỉnh số lượng
                $product = Product::find($item['productID']);
                if ($product) {
                    $product->stock =  $product->stock - (int)$item['quantity'];
                    $product->save();
                }
            }

            $order->status = 'success';
            $order->save();
            // Xóa giỏ hàng sau khi lưu đơn hàng thành công
            session()->forget('cart');

            // Commit transaction
            DB::commit();


            return response()->json(['success' => true, 'orderID' => $order->id]);
        } catch (\Exception $e) {
            // Rollback nếu có lỗi
            DB::rollBack();
            return response()->json(['error' => 'Đã xảy ra lỗi khi tạo đơn hàng'], 500);
        }
    }
}
