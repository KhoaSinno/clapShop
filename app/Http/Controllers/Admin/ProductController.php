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
        // Lấy tất cả sản phẩm cùng với hình ảnh chính
        $products = Product::where('active', true)->with(['category', 'mainImage'])->get(); // Lấy category và mainImage

        $categories = Category::all();

        return view('admin.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function listDelete()
    {
        // Lấy tất cả sản phẩm cùng với hình ảnh chính
        $products = Product::where('active', false)->with(['category', 'mainImage'])->get(); // Lấy category và mainImage

        $categories = Category::all();

        return view('admin.product.listDelete', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    //done - show form tạo sản phẩm
    public function show()
    {
        $categories = Category::all();
        return view(
            'admin.product.detail',
            [
                'title' => 'Chi tiết sản phẩm',
                'categories' => $categories
            ]
        );
    }


    public function edit($id)
    {

        $categories = Category::all();
        $product = Product::find($id);
        $product_images = Product_Image::where('productID', $id)->get();

        return view('admin.product.edit', [
            'title' => 'Chi tiết sản phẩm',
            'categories' => $categories,
            'product' => $product,
            'product_images' => $product_images,
        ]);
    }

    //hàm xóa ảnh trong phần sửa
    public function destroyImage(Product $product, $imageId)
    {
        $image = $product->images()->findOrFail($imageId);

        // // Xóa ảnh khỏi thư mục (thay thế 'public/images' bằng đường dẫn thực tế)
        // Storage::delete('public/images/' . $image->filename);

        $image->delete();

        return back()->with('success', 'Ảnh đã được xóa thành công');
    }

    //done
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
        // $product->description = $request->input('description');
        $product->description = "...";

        //khi them thong tin san pham thanh cong thi tai anh
        if ($product->save()) {
            // tim product them name
            $updatedProduct = Product::where('name', $product->name)->first();

            $fileName = time() . $request->file('ImageUpload')->getClientOriginalName();
            $path = $request->file('ImageUpload')->storeAs('images', $fileName, 'public');

            $productImage = new Product_Image();
            $productImage->productID = $updatedProduct->id; // ID của sản phẩm
            $productImage->image_url = '/storage/' . $path;; // Đường dẫn hình ảnh
            $productImage->desc = "";
            $productImage->type = "";
            $productImage->save();

            return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công');
        } else {
            return redirect()->route('admin.product')->with('error', 'Them sản phẩm thất bại');
        }


        return view('admin.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $categoryIDFromInput = $request->input('category');

        if ($product) {

            //kiem tra neu co thong tin khac thi moi cap nhat
            if (
                $request->input('name') != $product->name ||
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
                $request->input('description') != $product->description
            ) {
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
                $product->stock += $request->input('stock');
                $product->price = $request->input('price');

                $product->description = $request->input('description');

                $product->save();
                try {
                    //code...
                } catch (\Throwable $th) {
                    //throw $th;
                }
                if ($product->save()) {
                    try {
                        //code...
                        // tim product them name
                        $updatedProduct = Product::where('name', $product->name)->first();
                        $fileName = time() . $request->file('ImageUpload')->getClientOriginalName();
                        $path = $request->file('ImageUpload')->storeAs('images', $fileName, 'public');
                        $productImage = new Product_Image();
                        $productImage->productID = $updatedProduct->id; // ID của sản phẩm
                        $productImage->image_url = '/storage/' . $path;; // Đường dẫn hình ảnh
                        $productImage->desc = "";
                        $productImage->type = "";
                        $productImage->save();

                        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công. Thêm ảnh thành công.');
                    } catch (\Throwable $th) {
                        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công. Không có ảnh nào được cập nhật.');
                    }
                } else {
                    return redirect()->route('admin.product')->with('error', 'Cập nhật sản phẩm thất bại.');
                }

                return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công. Không có hình ảnh nào được cập nhật.');
            }
            return redirect()->route('admin.product')->with('error', 'Cập nhật sản phẩm thất bại!');


            if ($product) {
                $product->name = $request->input('name');
                $product->description = $request->input('description');
                $product->save();

                return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công');
            }
            return redirect()->back()->with('error', 'Cập nhật sản phẩm không thành công');
        }
    }

    //done
    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            // Xóa tất cả hình ảnh liên quan đến sản phẩm
            $product->active = 0;
            $product->save();
            return redirect()->route('admin.product')->with('success', 'Sản phẩm đã được xóa thành công.');
        } else {
            return redirect()->route('admin.product')->with('error', 'Không thể tìm thấy sản phẩm để xóa.');
        }
    }
}
