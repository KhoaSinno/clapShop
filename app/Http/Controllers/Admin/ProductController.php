<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
        ]);
    }
    //them, sua, xoa
    public function create(){
        //
    }
    public function update(){
        //
    }
    public function delete(){
        //
    }
}
