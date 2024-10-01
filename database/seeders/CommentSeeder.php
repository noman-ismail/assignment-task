<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use App\Models\User; // Ensure this is imported
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Create multiple users
        $users = User::factory(10)->create(); // Adjust the number as needed

        foreach ($users as $user) {
            // Create multiple posts for each user
            for ($i = 1; $i <= 3; $i++) { // Create 3 posts per user
                $post = Post::create([
                    'title' => 'Sample Post ' . $i . ' by ' . $user->name,
                    'body' => 'This is the body of sample post ' . $i . ' by ' . $user->name,
                    'content' => 'Detailed content of sample post ' . $i . ' by ' . $user->name,
                    'user_id' => $user->id,
                ]);

                // Create comments for the post
                $post->comments()->create(['body' => 'Great post!']);
                $post->comments()->create(['body' => 'Thanks for sharing!']);
            }

            // Create a sample video for each user
            $video = Video::create([
                'title' => 'Sample Video by ' . $user->name,
                'url' => 'http://example.com/video/' . $user->id
            ]);

            // Create comments for the video
            $video->comments()->create(['body' => 'Nice video!']);
            $video->comments()->create(['body' => 'Very informative.']);
        }
    }
}
