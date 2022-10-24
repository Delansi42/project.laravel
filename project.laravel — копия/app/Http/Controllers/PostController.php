<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class PostController
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('post/index', compact('posts'));
    }

    public function users($id)
    {
        $posts = Post::whereHas('user', function (Builder $query) use ($id){ $query->where('user_id', $id);
        })->get();
        $users = $posts->user()->paginate(10);
        return view('post/users', compact('posts', 'users'));
   }
}
