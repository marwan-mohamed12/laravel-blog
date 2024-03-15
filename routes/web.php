<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HomePage Route
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Display List of posts
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/table', [PostController::class, 'showPostsTable'])->name('posts.postsTable');

// Show form to Enter post data
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

// Show Trashed Posts
Route::get('posts/trash', [PostController::class, 'showTrashedPosts'])->name('posts.trash');

Route::post('posts', [PostController::class, 'store'])->name('posts.store'); //save data

// Get info about specific post
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');

// Show edit form for specific post
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->where('id', '[0-9]+');

// Update specific post
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update')->where('id', '[0-9]+');

// Delete specific post
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name("posts.destroy")->where('id', '[0-9]+');

// Error Page
Route::fallback(fn () => view('error'));
