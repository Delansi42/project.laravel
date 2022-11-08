<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminTagController
{
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin/tag/index', compact('tags'));
    }

    public function show($id)
    {
        return view('admin/tag/show', [
            'tag' => Tag::find($id)
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
        $tag = Tag::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $tag->comments()->save($comment);

        return redirect()->route('admin.tag.show', ['id' => $tag->id]);
    }

    public function create()
    {
        $tag = new Tag();
        return view('admin/tag/create', compact('tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:tags,title',
                'min:3',
            ],
            'slug' => [
                'required',
                'unique:tags,slug',
                'min:3',
            ],
        ]);

        Tag::create($request->all());
        return redirect()->route('admin.tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin/tag/update', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $request->validate([
            'title' => [
                'required',
                'min:3',
                Rule::unique('tags', 'title')->ignore($tag->id),
            ],
            'slug' => [
                'required',
                'unique:tags,slug',
                'min:3',
            ]
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tag');
    }
}
