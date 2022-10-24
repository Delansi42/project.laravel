<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoryController
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin/category/index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('admin/category/create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:categories,title',
                'min:3',
            ],
            'slug' => [
                'required',
                'unique:categories,slug',
                'min:3',
            ]
        ]);

        $category = Category::create($request->all());
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin/category/update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'title' => [
                'required',
                'min:3',
                Rule::unique('categories', 'title')->ignore($category->id),
            ],
            'slug' => [
                'required',
                'unique:categories,slug',
                'min:3',
            ]
        ]);

        $category->update($request->all());
        return redirect()->route('admin.category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category');
    }
}
