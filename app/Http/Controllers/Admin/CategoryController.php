<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use App\Models\Category;
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('admin.category.index', [
            'title' => 'Danh sách danh mục',
        ]);
=======
        $categories = Category::all();
        return view('admin.category.index', compact('categories'), ['title' => 'Danh sách danh mục']);
        
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index');
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
    }
}
