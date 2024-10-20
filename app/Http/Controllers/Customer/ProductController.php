<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function applySort($request, $proPerPage = 10)
    {
        // Lấy giá trị của 'sort' từ request, mặc định là 'default' nếu không có giá trị
        $sort = $request->input('sort', 'default');

        // Khởi tạo truy vấn sản phẩm
        $productsQuery = Product::query()->with(['category', 'mainImage']);

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

        // Sau khi đã thêm điều kiện sắp xếp, tiến hành phân trang
        $products = $productsQuery->paginate($proPerPage);

        return [$sort, $products];
    }

    public function index(Request $request)
    {

        // $products = Product::with(['category', 'mainImage'])->get(); // Lấy category và mainImage

        $latestProducts = Product::orderBy('created_at', 'desc')->take(6)->get();
        // Gọi hàm applySort để lấy giá trị sort và danh sách sản phẩm
        list($sort, $products) = $this->applySort($request, 3);
        $categories = Category::all();

        $productCount = Product::all()->count();


        // Trả về view với biến $sort được truyền đi
        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
            'sort' => $sort,
            'count' => $productCount,
            'latestProducts' => $latestProducts
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
        $productCount = Product::where('categoryID', $category->id)->count();

        // Trả về view index và truyền dữ liệu category và products
        return view('customer.product.index', [
            'title' => 'Sản phẩm thuộc danh mục: ' . $category->name,
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'sort' => 'default',
            'count' => $productCount

        ]);
    }

    public function show($id)
    {
        // Tìm sản phẩm theo ID và lấy thông tin category
        $product = Product::with('category')->find($id);

        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Lấy danh sách sản phẩm liên quan cùng category, loại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('categoryID', $product->categoryID)
            ->where('id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
            ->limit(4) // Giới hạn số lượng sản phẩm liên quan, ví dụ 4 sản phẩm
            ->get();

        // Trả về view để hiển thị chi tiết sản phẩm cùng với các sản phẩm liên quan
        return view('customer.product.detail', [
            'title' => 'Chi tiết sản phẩm',
            'product' => $product,
            'category' => $product->category,
            'relatedProducts' => $relatedProducts // Truyền danh sách sản phẩm liên quan vào view
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

    public function search(Request $request)
    {
        $categories = Category::all();

        list($sort, $products) = $this->applySort($request, 3);

        // Lấy từ khóa từ request
        $query = $request->input('query');
        // Tìm kiếm sản phẩm theo từ khóa trong tên sản phẩm hoặc mô tả
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(30); // Phân trang kết quả tìm kiếm

        $productCount = $products->count();

        // Trả về view kèm theo danh sách sản phẩm tìm kiếm được
        return view('customer.product.search_results', [
            'title' => 'Kết quả tìm kiếm cho: ' . $query,
            'products' => $products,
            'query' => $query,
            'categories' => $categories,
            'sort' => $sort,
            'count' => $productCount
        ]);
    }
}
