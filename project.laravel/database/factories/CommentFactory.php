<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = $this->faker->randomElement([Post::class, Page::class, Tag::class, Category::class]);
        return [
            'body' => $this->faker->sentences(rand(2, 5), true),
            'commentable_id' => $rand::factory(),
            'commentable_type' => $rand,
        ];
    }
}
