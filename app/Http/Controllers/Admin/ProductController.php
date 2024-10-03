<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category') -> get();

        return view('admin.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }
    public function create()
    {
        //
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        if ($product) {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->save();
            
            return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công');
        }        
        return redirect()->back()->with('error', 'Cập nhật sản phẩm không thành công');
    }
    public function delete($id)
    {
        //
    }

}
