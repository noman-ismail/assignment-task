<?php

namespace Database\Seeders;

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
        // Call other seeders
        $this->call([
            // UserSeeder::class,  // Call the UserSeeder
            CommentSeeder::class, // Call the CommentSeeder
            // You can add other seeders here...
        ]);
    }
}
