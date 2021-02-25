<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('admin.category.form');
    }


    public function store(CategoryRequest $request)
    {
        $new_category = new Category();
        $new_category->title = $request->title;
        $new_category->save();

        return redirect(route('category.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.form', ['category' => $category]);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->title = $request->title;
        $category->save();
        return redirect()->route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'));
    }
}
