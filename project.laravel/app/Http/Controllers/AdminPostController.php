<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin/post/index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/post/create', compact('post', 'users', 'tags', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:posts,title',
                'min:5',
            ],
            'body' => ['required'],
            'user_id' => ['exists:users,id'],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->input('tags'));
        return redirect()->route('admin.post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/post/update', compact('post', 'users', 'tags', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => [
                'required',
                'min:5',
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'body' => ['required'],
            'user_id' => ['exists:users,id'],
            'category_id' => ['exists:categories,id'],
            'tags' => ['exists:tags,id']
        ]);

        $post->update($request->all());
        $post->tags()->sync($request->input('tags'));
        return redirect()->route('admin.post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.post');
    }
}
