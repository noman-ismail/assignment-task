<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 users, each with 5 posts
        User::factory(10)->create()->each(function ($user) {
            Post::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
