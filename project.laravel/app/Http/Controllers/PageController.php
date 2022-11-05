<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController
{
    public function index()
    {
        return view('page/index', [
            'pages' => Page::all()
        ]);
    }

    public function show($id)
    {
        return view('page/show', [
            'page' => Page::find($id)
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
        $page = Page::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $page->comments()->save($comment);

        return redirect()->route('page.show', ['id' => $page->id]);
    }
}
