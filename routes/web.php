<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('posts.index'); // News feed
Route::get('/post/create', [BlogController::class, 'create'])->name('posts.create'); // Create post form
Route::get('/post/show/{slug}', [BlogController::class, 'show'])->name('posts.show'); // Single post
Route::post('/post', [BlogController::class, 'store'])->name('posts.store'); // Store post
Route::get('/post/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit'); // Edit post form
Route::put('/post/{id}', [BlogController::class, 'update'])->name('posts.update'); // Update post
Route::delete('/post/{id}', [BlogController::class, 'destroy'])->name('posts.destroy'); // Delete post

require __DIR__.'/auth.php';
