<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function getProducts()
    {
        $products = Product::get();

        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        $latestProducts = Product::orderBy('created_at', 'desc')->take(8)->get();
        // $blogPosts = BlogPost::orderBy('created_at', 'desc')->take(3)->get();
        $title = 'Trang chủ';
    
        return view('customer.home', compact('categories',  'latestProducts', 'title'));
    }

}
