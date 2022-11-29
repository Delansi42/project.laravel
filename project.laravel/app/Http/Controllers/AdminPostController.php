<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin/post/index', compact('posts'));
    }

    public function show($id)
    {
        return view('admin/post/show', [
            'post' => Post::find($id)
        ]);
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'body' => [
                'required',
                'min:5',
            ],
        ]);
        $post = Post::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $post->comments()->save($comment);

        return redirect()->route('admin.post.show', ['id' => $post->id]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $post = new Post();
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/post/create', compact('post', 'users', 'tags', 'categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('store', Post::class);

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

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/post/update', compact('post', 'users', 'tags', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

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

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.post');
    }
}
