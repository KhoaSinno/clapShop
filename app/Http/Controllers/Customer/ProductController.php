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
        // Lấy giá trị của 'sort' từ request, mặc định là 'default'
        $sort = $request->input('sort', 'default');
    
        // Lấy giá trị lọc giá 'price_range'
        $priceRange = $request->input('price_range', 'casual');
    
        // Khởi tạo truy vấn sản phẩm
        $productsQuery = Product::where('active', true)->with(['category', 'mainImage']);
    
        // Lọc theo khoảng giá
        if ($priceRange === 'lower_15') {
            $productsQuery->where('price', '<', 15000000);
        } elseif ($priceRange === 'greater_15') {
            $productsQuery->where('price', '>=', 15000000);
        }
    
        // Thêm điều kiện sắp xếp dựa trên giá trị của $sort
        switch ($sort) {
            case 'asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }
    
        // Phân trang sản phẩm
        $products = $productsQuery->paginate($proPerPage);
    
        return [$sort, $products];
    }
    

    public function index(Request $request)
    {

        // $products = Product::with(['category', 'mainImage'])->get(); // Lấy category và mainImage

        $latestProducts = Product::where('active', true)->orderBy('created_at', 'desc')->take(6)->get();
        // Gọi hàm applySort để lấy giá trị sort và danh sách sản phẩm
        list($sort, $products) = $this->applySort($request, 9);
        $categories = Category::all();

        $productCount = Product::where('active', true)->count();


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
        $latestProducts = Product::where('active', true)->orderBy('created_at', 'desc')->take(6)->get();

        // Nếu không tìm thấy category, có thể xử lý lỗi
        if (!$category) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }

        // Lấy tất cả sản phẩm theo categoryID và phân trang
        $products = Product::where('categoryID', $category->id)
            ->where('active', true)
            ->paginate(9);

        $productCount = Product::where('categoryID', $category->id)
            ->where('active', true)
            ->count();


        // Trả về view index và truyền dữ liệu category và products
        return view('customer.product.index', [
            'title' => 'Sản phẩm thuộc danh mục: ' . $category->name,
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'sort' => 'default',
            'count' => $productCount,
            'latestProducts' => $latestProducts

        ]);
    }

    public function show($id)
    {
        // Tìm sản phẩm theo ID và lấy thông tin category
        $product = Product::where('active', true)->with('category')->find($id);

        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Lấy danh sách sản phẩm liên quan cùng category, loại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('categoryID', $product->categoryID)
            ->where('id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
            ->where('active', true)
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



    public function search(Request $request)
    {
        $categories = Category::all();

        list($sort, $products) = $this->applySort($request, 3);

        // Lấy từ khóa từ request
        $query = $request->input('query');
        // Tìm kiếm sản phẩm theo từ khóa trong tên sản phẩm hoặc mô tả
        $products = Product::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
        })
            ->where('active', true)
            ->paginate(30);

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

    public function filter(Request $request)
    {
        // Gọi applySort để lấy giá trị 'sort' và danh sách sản phẩm được phân trang
        list($sort, $products) = $this->applySort($request, 9);
    
        // Lấy 6 sản phẩm mới nhất
        $latestProducts = Product::where('active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    
        // Danh sách danh mục
        $categories = Category::all();
    
        // Tổng số sản phẩm
        $productCount = $products->count();
    
        // Trả về view với các biến cần thiết
        return view('customer.product.index', [
            'title' => 'Lọc sản phẩm',
            'products' => $products,
            'categories' => $categories,
            'sort' => $sort,
            'count' => $productCount,
            'latestProducts' => $latestProducts,
        ]);
    }
    
    
    
    

    
}
