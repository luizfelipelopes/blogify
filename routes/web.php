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

});