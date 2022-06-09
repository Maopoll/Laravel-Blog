<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index'])
    ->name('index');

Route::resource('blog', PostController::class)
    ->except(['index, create']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [PostController::class, 'userPosts'])
        ->name('dashboard');

    Route::get('blog/create', [PostController::class, 'create'])
        ->name('blog.create');

    Route::post('blog/{post}/comment', [CommentController::class, 'store'])
        ->name('comment.store');
});

require __DIR__ . '/auth.php';
