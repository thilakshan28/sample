<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->prefix('posts')->group( function() {
    Route::get('/create', [PostController::class, 'create'])->name('post.add');
    Route::post('/', [PostController::class, 'store'])->name('post.store');

    Route::prefix('{post}')->group( function () {
        Route::get('/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/', [PostController::class, 'update'])->name('post.update');
        Route::get('/delete', [PostController::class, 'delete'])->name('post.delete');
        Route::delete('/', [PostController::class, 'destroy'])->name('post.destroy');
    });
});

Route::get('/comments', [CommentController::class, 'index'])->middleware(['auth', 'verified'])->name('comments');


require __DIR__.'/auth.php';
