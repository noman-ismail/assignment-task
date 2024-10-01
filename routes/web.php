<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']); // Only accessible to admins
    // Add more admin routes here
});
// Route::group(['middleware' => ['admin']], function () {

    Route::get('/eager-loading', [PostController::class, 'index']);
    Route::get('/active-users-last-month', [PostController::class, 'activeUsersLastMonth']);
    Route::get('/posts-with-comments', [PostController::class, 'showPostsWithComments']);
// });
Route::post('/send-email', [PostController::class, 'sendEmail']);


