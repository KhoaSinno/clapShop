<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'), ['title' => 'Danh sách danh mục']);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'imgURL' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        $path = null;
        if ($request->hasFile('imgURL')) {
            $path = $request->file('imgURL')->store('images', 'public');
        }

        // Create the category
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->imgURL = $path ? 'storage/' . $path : null;
        $category->save();

        return redirect()->route('admin.category')->with('success', 'Tạo danh mục thành công.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'imgURL' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the name
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        // Handle the file upload
        if ($request->hasFile('imgURL')) {
            // Store the uploaded file in the 'public/images' directory
            $path = $request->file('imgURL')->store('images', 'public');

            // Delete the old image if it exists
            if ($category->imgURL) {
                Storage::disk('public')->delete($category->imgURL);
            }

            // Update the imgURL column with the new path
            $category->imgURL = 'storage/' . $path;
        }

        // Save the category
        $category->save();

        return redirect()->route('admin.category')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Delete the associated image if it exists
            if ($category->imgURL) {
                $oldPath = str_replace('storage/', '', $category->imgURL);
                Storage::disk('public')->delete($oldPath);
            }

            // Delete the category
            $category->delete();

            return redirect()->route('admin.category')->with('success', 'Danh mục đã được xóa thành công.');
        } catch (\Exception $e) {
            return redirect()->route('admin.category')->with('error', 'Đã xảy ra lỗi khi xóa danh mục.');
        }
    }
}
