<?php

namespace Tests\Controllers;

use Tests\Model\Category;
use Tests\Model\Post;
use Tests\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('category/trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return new RedirectResponse('/category');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category/show', compact('category'));
    }

    public function create()
    {
        $category = new Category();
        $isCreate = true;
        return view('category/form', compact('category', 'isCreate'));
    }

    public function store()
    {
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => [
                'required',
                'unique:categories,title',
                'min:3',
            ],
            'slug' => [
                'required',
                'unique:categories,slug',
                'min:3',
            ],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['success'] = 'Запис успішно добавлений';
        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $isCreate = false;
        return view('category/form', compact('category', 'isCreate'));
    }

    public function update()
    {
        $data = request()->all();

        $category = Category::find($data['id']);
        $category->title = $data['title'];
        $category->slug = $data['slug'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('categories', 'title')->ignore($category->id),
            ],
            'slug' => [
                'required',
                'unique:categories,slug',
                'min:3',
            ],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category->save();
        $_SESSION['success'] = 'Запис успішно добавлений';
        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return new RedirectResponse('/category');
    }

}