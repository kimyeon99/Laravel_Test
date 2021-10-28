<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postscontroller;
use App\Http\Controllers\Likescontroller;
use App\Http\Controllers\Commentscontroller;



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
    return view('dashboard');
})->name('dashboard');

Route::resource('/posts', Postscontroller::class);
Route::delete('/posts/image/{post}', [Postscontroller::class, "imageDel"])->name('posts.imageDel');

Route::get('/posts/comments/{com_id}/edit', [CommentsController::class, "edit"])->name('comments.edit');
Route::post('/posts/{post_id}/comments', [CommentsController::class, "store"])->name('comments.store');
Route::patch('/posts/comments/{com_id}', [CommentsController::class, "update"])->name('comments.update');
Route::delete('/posts/comments/{com_id}', [CommentsController::class, "destroy"])->name('comments.destroy');


Route::post('/posts/{post}/likes', [LikesController::class, "store"])->name('likes.store');

require __DIR__ . '/auth.php';
