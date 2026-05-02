<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment'=>fake()->sentence(),
            'author_id'=>Author::pluck('id')->random(),
            'post_id'=>Post::pluck('id')->random()
        ];
    }
}