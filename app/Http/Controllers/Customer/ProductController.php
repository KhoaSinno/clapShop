<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use App\Models\Product;
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
use Illuminate\Http\Request;

class ProductController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function index()
    {
        $products = Product::get();

        return view('customer.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
}
