<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index()
    // {
    //     // Lấy danh sách sản phẩm và phân trang
    //     $products = Product::paginate(3); // 10 sản phẩm trên mỗi trang
    //     $categories = Category::all();

    //     return view('customer.product.index', [
    //         'title' => 'Danh sách sản phẩm',
    //         'products' => $products,
    //         'categories' => $categories,
    //     ]);
    // }

    public function index(Request $request)
    {
        // Lấy giá trị của 'sort' từ request, mặc định là 'default' nếu không có giá trị
        $sort = $request->input('sort', 'default');

        // Khởi tạo truy vấn sản phẩm
        $productsQuery = Product::query();

        // Thêm điều kiện sắp xếp dựa trên giá trị của $sort
        switch ($sort) {
            case 'asc':
                $productsQuery->orderBy('price', 'asc'); // Sắp xếp giá tăng dần
                break;
            case 'desc':
                $productsQuery->orderBy('price', 'desc'); // Sắp xếp giá giảm dần
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc'); // Mặc định: sắp xếp theo sản phẩm mới nhất
                break;
        }

        // Lấy danh sách sản phẩm và phân trang
        $products = $productsQuery->paginate(3); // 3 sản phẩm trên mỗi trang
        $categories = Category::all();

        // Trả về view với biến $sort được truyền đi
        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
            'sort' => $sort // Truyền biến $sort vào view
        ]);
    }



    public function showProductsBySlug(Request $request, $slug)
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

        // Lấy giá trị của 'sort' từ request, mặc định là 'default' nếu không có giá trị
        $sort = $request->input('sort', 'default');

        // Khởi tạo truy vấn sản phẩm
        $productsQuery = Product::query();

        // Thêm điều kiện sắp xếp dựa trên giá trị của $sort
        switch ($sort) {
            case 'asc':
                $productsQuery->orderBy('price', 'asc'); // Sắp xếp giá tăng dần
                break;
            case 'desc':
                $productsQuery->orderBy('price', 'desc'); // Sắp xếp giá giảm dần
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc'); // Mặc định: sắp xếp theo sản phẩm mới nhất
                break;
        }

        // Trả về view index và truyền dữ liệu category và products
        return view('customer.product.index', [
            'title' => 'Sản phẩm thuộc danh mục: ' . $category->name,
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'sort' => $sort

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

    public function filter(Request $request)
    {
        $priceRange = $request->input('price_range');

        $productsQuery = Product::query();

        switch ($priceRange) {
            case '0': // < 10tr
                $productsQuery->where('price', '<', 10000000);
                break;
            case '1': // 10tr - 20tr
                $productsQuery->whereBetween('price', [10000000, 20000000]);
                break;
            case '2': // 20tr - 30tr
                $productsQuery->whereBetween('price', [20000000, 30000000]);
                break;
            case '3': // > 30tr
                $productsQuery->where('price', '>', 30000000);
                break;
            default:
                break;
        }

        // Lấy danh sách sản phẩm và phân trang
        $products = $productsQuery->paginate(10); // Bạn có thể điều chỉnh số lượng sản phẩm trên mỗi trang
        $categories = Category::all();

        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
