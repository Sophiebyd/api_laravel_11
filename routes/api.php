<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ***************** Routes Users **************************************
Route::apiResource("users", App\Http\Controllers\API\UserController::class);

// ***************** Routes Comments **************************************
Route::apiResource("comments", App\Http\Controllers\API\CommentController::class);

// ***************** Routes Posts **************************************
Route::apiResource("posts", App\Http\Controllers\API\PostController::class);