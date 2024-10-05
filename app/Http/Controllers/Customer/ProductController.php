<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }

    public function showProductsBySlug($slug)
    {
        // Tìm danh mục dựa theo slug
        $category = Category::where('slug', $slug)->first();

        // Nếu không tìm thấy category, có thể xử lý lỗi
        if (!$category) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }

        // Lấy tất cả sản phẩm theo categoryID
        $products = Product::where('categoryID', $category->id)->get();

        // Trả về view index và truyền dữ liệu category và products
        return view('customer.product.index', [
            'title' => 'Sản phẩm thuộc danh mục: ' . $category->name,
            'products' => $products,
            'category' => $category
        ]);
    }

    public function show($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::with('category')->find($id); // Sử dụng eager loading để lấy category

        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view để hiển thị chi tiết sản phẩm
        return view('customer.product.detail', [
            'title' => 'Chi tiết sản phẩm',
            'product' => $product,
            'category' => $product->category // Truyền category vào view
        ]);
    }
}
