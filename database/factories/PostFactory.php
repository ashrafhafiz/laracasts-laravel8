<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->realTextBetween(30, 50);
        $slug = Str::slug($title);
        $body = fake()->text(500);

        return [
            'title' => $title,
            'slug' => $slug,
            'excerpt' => Str::limit($body, 100),
            'body' => $body,
            'category_id' => rand(1,3),
            'user_id' => rand(1,5)
        ];
    }
}
