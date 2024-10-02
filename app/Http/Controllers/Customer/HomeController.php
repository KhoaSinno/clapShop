<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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
}
