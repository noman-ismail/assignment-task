<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->has('posts')->get();
        return view('eagerLoadingTask', compact('users'));
    }

    public function activeUsersLastMonth()
    {
        // Use the custom query scope
        $activeUsers = User::activeRegisteredLastMonth()->with('posts')->get();

        // Pass the data to the view
        return view('activeUsersLastMonth', compact('activeUsers'));
    }

    public function showPostsWithComments()
    {
        // Fetch all posts with their associated comments
        $posts = Post::with('comments')->get(); // Eager load comments for posts

        // Fetch all videos with their associated comments
        $videos = Video::with('comments')->get(); // Eager load comments for videos

        // Pass the posts and videos to the view
        return view('postsWithComments', compact('posts', 'videos'));
    }

    public function sendEmail(Request $request)
    {
        // Custom validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid email address.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $emailAddress = $request->input('email');

        SendEmailJob::dispatch($emailAddress)->delay(now()->addMinutes(10));

        return response()->json(['message' => 'Email will be sent in 10 minutes.']);
    }

}
