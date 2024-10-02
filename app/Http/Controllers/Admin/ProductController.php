<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('customer.product.index');
    }
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
