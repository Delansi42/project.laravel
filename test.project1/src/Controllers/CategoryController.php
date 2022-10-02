<?php
namespace Tests\Controllers;

use Tests\Model\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category/show', compact('category'));
    }

    public function create()
    {
        $category = new Category();
        return view('category/create', compact('category'));
    }

    public function store()
    {
        $request = request();

        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/update', compact('category'));
    }

    public function update()
    {
        $request = request();

        $category = Category::find($request->input('id'));
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
            $posts = $category->posts;
            foreach ($posts as $post){
                $post->delete();
            }
        $category->delete();
        return new RedirectResponse('/category');
    }
}