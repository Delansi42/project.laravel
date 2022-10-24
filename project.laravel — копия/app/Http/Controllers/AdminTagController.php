<?php
namespace App\Http\Controllers;

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

        $tag = Tag::create($request->all());
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

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag');
    }
}
