<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController
{
    public function __invoke()
    {
        $comments = Comment::all();
        return view('comments/index', compact('comments'));
    }
}
