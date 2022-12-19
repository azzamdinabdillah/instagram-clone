<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LikePostUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LikePostUser>
 */
class LikePostUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = LikePostUser::class;

    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 50),
            'posts_id' => mt_rand(1, 50),
        ];
    }
}
