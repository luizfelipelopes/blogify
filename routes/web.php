<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', function() {

    return view('auth.login');

})->name('login');

Route::get('/register', function() {

    return view('auth.register');

})->name('register');


Route::prefix('/posts')->group(function(){

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/import', [PostController::class, 'import'])->name('posts.import');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.delete');
    
});
