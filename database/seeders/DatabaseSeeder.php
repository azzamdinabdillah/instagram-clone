<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\LikesFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(50)->create();
        \App\Models\Posts::factory(50)->create();
        \App\Models\Comments::factory(2000)->create();
        \App\Models\Follow::factory(2000)->create();
        \App\Models\LikePostUser::factory(1000)->create();

        // LikesFactory::factoryForModel()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
