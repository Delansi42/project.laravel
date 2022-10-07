<?php

namespace Tests\Controllers;

use Tests\Model\Category;
use Tests\Model\Post;
use Tests\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post/show', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/create', compact('post', 'categories', 'tags'));
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'unique:posts,title',
                'min:3',
            ],
            'slug' => ['required'],
            'body' => ['required'],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new Post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags']);

        $_SESSION['success'] = 'Запис успішно добавлений';
        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/update', compact('post', 'categories', 'tags'));
    }

    public function update()
    {
        $data = request()->all();

        $post = Post::find($data['id']);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:5',
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'slug' => ['required'],
            'body' => ['required'],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $post->save();
        $post->tags()->sync($data['tags']);
        $_SESSION['success'] = 'Запис успішно добавлений';
        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return new RedirectResponse('/post');
    }
}