<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
        try {
            Category::create($request->all());
            return redirect()->route('admin.category')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.category')->with('error', 'Failed to create category.');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
            return redirect()->route('admin.category')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.category')->with('error', 'Failed to update category.');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete category.');
        }
    }
}
