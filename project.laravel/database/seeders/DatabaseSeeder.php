<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Page;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        $categories = Category::factory(25)->create();
        $posts = Post::factory(100)->make()->each(function ($post) use ($users, $categories) {
            $post->user_id = $users->random()->id;
            $post->category_id = $categories->random()->id;
            $post->save();
        });

        $tags = Tag::factory(100)->create();
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(5, 10))->pluck('id'));
        });

        Page::factory(20)->create();
        Comment::factory(20)->create();
    }
}
