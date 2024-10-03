<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category') -> get();
        $product_images = Product_Image::with('product') ->get();
        $categories = Category::all();

        return view('admin.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
            'product_images' => $product_images
        ]);
    }
    public function create(Request $request)
    {
        $product = new Product();
        //cac thong tin cua san pham
        $product->name = $request->input('name');
        $product->categoryID = $request->input('category');
        $product->cpu = $request->input('cpu');
        $product->ram = $request->input('ram');
        $product->storage = $request->input('storage');
        $product->battery = $request->input('battery');
        $product->screen = $request->input('screen');
        $product->card = $request->input('card');
        $product->connector = $request->input('connector');
        $product->weight = $request->input('weight');
        $product->keyboard = $request->input('keyboard');
        $product->os = $request->input('os');
        $product->warranty = $request->input('warranty');
        $product->color = $request->input('color');
        $product->material = $request->input('material');
        $product->price = $request->input('price');        
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        if($product->save()){
            // tim product them name
            $product = Product::where('name', $product->name)->first();

            $images = [];
            foreach ($request->file('images') as $image){
                $imageName = $image->name;
                $image->storeAs('public/products', $imageName);
                $images[] = 'storage/products/' . $imageName;
            }
            // Lưu đường dẫn hình ảnh vào bảng product_images
            if (!empty($images)) {
                foreach ($images as $imagePath) {
                    $productImage = new Product_Image();
                    $productImage->product_id = $product->id; // ID của sản phẩm
                    $productImage->image_path = $imagePath; // Đường dẫn hình ảnh
                    $productImage->save();
                }
            }
            return redirect()->route('admin.product')->with('success', 'Them sản phẩm thành công');
        }
        else{
            return redirect()->route('admin.product')->with('error', 'Them sản phẩm that bai');
        }

    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $categoryIDFromInput = $request->input('category');
        
        if ($product) {

            //kiem tra neu co thong tin khac thi moi cap nhat
            if ($request->input('name') != $product->name || 
            $product->select('category') != $product->category_id ||
            $request->input('cpu') != $product->cpu ||
            $request->input('ram') != $product->ram ||
            $request->input('storage') != $product->storage ||
            $request->input('screen') != $product->screen ||
            $request->input('card') != $product->card ||
            $request->input('connector') != $product->connector ||
            $request->input('weight') != $product->weight || 
            $request->input('keyboard') != $product->keyboard || 
            $request->input('battery') != $product->battery || 
            $request->input('os') != $product->os || 
            $request->input('material') != $product->material || 
            $request->input('stock') != $product->stock || 
            $request->input('description') != $product->description){
                $product->name = $request->input('name');
                $product->categoryID = $categoryIDFromInput;
                $product->cpu = $request->input('cpu');
                $product->ram = $request->input('ram');
                $product->storage = $request->input('storage');
                $product->screen = $request->input('screen');
                $product->card = $request->input('card');
                $product->connector = $request->input('connector');
                $product->weight = $request->input('weight');
                $product->keyboard = $request->input('keyboard');
                $product->os = $request->input('os');
                $product->material = $request->input('material');
                $product->stock = $request->input('stock');

                $product->description = $request->input('description');

                $product->save();
                
                return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công');
            }
            return redirect()->route('admin.product')->with('error', 'Cập nhật khong sản phẩm thành công');

        }        
        return redirect()->back()->with('error', 'Cập nhật sản phẩm không thành công');
    }
    public function delete($id)
    {
        //
    }

}
