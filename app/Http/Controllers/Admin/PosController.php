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
}
