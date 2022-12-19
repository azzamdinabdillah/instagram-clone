<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 50),
            'likes' => mt_rand(1, 2000),
            'descriptions' => fake()->text(200),
            'image' => 'https://api.lorem.space/image/furniture?w=460&h=460&hash=' . Str::random(10),
        ];
    }
}
