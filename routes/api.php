<?php

use App\Http\Controllers\AuthenticationController;
use App\Rest\Controllers\CategoryController;
use App\Rest\Controllers\PostsController;
use App\Rest\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Lomkit\Rest\Facades\Rest;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Rest::resource('users', UsersController::class);
    Rest::resource('posts', PostsController::class);
});

Rest::resource('categories', CategoryController::class);
