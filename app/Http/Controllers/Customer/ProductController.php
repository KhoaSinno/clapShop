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
        // Lấy danh sách sản phẩm và phân trang
        $products = Product::paginate(3); // 10 sản phẩm trên mỗi trang
        $categories = Category::all();

        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function showProductsBySlug($slug)
    {
        $categories = Category::all();

        // Tìm danh mục dựa theo slug
        $category = Category::where('slug', $slug)->first();

        // Nếu không tìm thấy category, có thể xử lý lỗi
        if (!$category) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }

        // Lấy tất cả sản phẩm theo categoryID và phân trang
        $products = Product::where('categoryID', $category->id)->paginate(3);


        // Trả về view index và truyền dữ liệu category và products
        return view('customer.product.index', [
            'title' => 'Sản phẩm thuộc danh mục: ' . $category->name,
            'products' => $products,
            'category' => $category,
            'categories' => $categories,

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
