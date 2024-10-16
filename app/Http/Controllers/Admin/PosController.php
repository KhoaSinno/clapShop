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
        return view('admin.pos.index', [
            'title' => 'POS Bán hàng',
            'products' => $products,
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
                  <td><input class="so--luong1" type="number" value="1" min="1"></td>
                <td>' . number_format($product->price) . ' VND</td>
                <td class="text-center">
                    <button class="btn btn-success btn-sm add-to-cart" data-id="' . $product->id . '">Thêm</button>
                </td>
            </tr>';
            }
        } else {
            $output = '<tr><td colspan="6">Không có sản phẩm nào được tìm thấy.</td></tr>';
        }

        // Trả về chuỗi HTML
        return $output;
    }
}
