<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return redirect('/posts'); });
    
    // Employee
    Route::get('/employee/create', [UserController::class, 'create']);
    Route::post('/employee/store', [UserController::class, 'store']);

    // Post
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store']);
    Route::get('/post/{post}/edit', [PostController::class, 'edit']);
    Route::get('/post/{post}/delete', [PostController::class, 'delete']);
    Route::post('/post/{post}/update', [PostController::class, 'update']);

    Route::get('/posts/employee/{user}', [PostController::class, 'employeePosts']);
    Route::get('/posts/category/{category}', [PostController::class, 'index']);
});

Auth::routes();
