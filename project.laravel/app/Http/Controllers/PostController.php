<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::with(['user', 'category', 'tags'])->paginate(15);
        return view('post/index', compact('posts'));
    }

    public function authorPosts($id)
    {
        $posts = Post::query()
            ->where(['user_id' => $id])
            ->paginate(15);

        return view('post/authorPosts', compact('posts'));
   }

    public function categoryPosts($id)
    {
        $posts = Post::query()
            ->where(['category_id' => $id])
            ->paginate(15);

        return view('post/categoryPosts', compact('posts'));
    }

    public function authorCategoryPosts($authorId, $categoryId)
    {
        $posts = Post::whereHas('user', function($q) use ($authorId, $categoryId) {
            $q->where([
                'user_id' => $authorId,
                'category_id' => $categoryId,
            ]);
        })->paginate(15);

        return view('post/authorCategoryPosts', compact('posts'));
    }

    public function tagPosts($id)
    {
        $posts = Post::whereHas('tags', function($q) use ($id) {
            $q->where(['tag_id' => $id]);
        })->paginate(15);

        return view('post/tagPosts', compact('posts'));
    }

    public function authorCategoryTagPosts($authorId, $categoryId, $tagId)
    {
        $posts = Post::whereHas('tags', function($q) use ($authorId, $categoryId, $tagId) {
            $q->where([
                'tag_id' => $tagId,
                'user_id' => $authorId,
                'category_id' => $categoryId,
            ]);
        })->paginate(15);

        return view('post/authorCategoryTagPosts', compact('posts'));
    }
}
