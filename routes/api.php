<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BillingProductController;
use App\Rest\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Lomkit\Rest\Facades\Rest;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::resource('/billing', BillingProductController::class);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Rest::resource('users', UsersController::class);
});

