<?php

use App\Http\Controllers\Dashboard\Api\BookController;
use App\Http\Controllers\Dashboard\Api\ImageController;
use App\Http\Controllers\Dashboard\Api\ReviewController;
use App\Http\Controllers\Dashboard\Api\UserController;
use Illuminate\Support\Facades\Route;

// Delete image
Route::delete('/delete/image/{folderName}/{fileName}', [ImageController::class, 'deletePhoto']);

// Website user
Route::put('/users/is-active/{id}', [UserController::class, 'isActive']);
Route::put('/books/is-active/{book}', [BookController::class, 'isActive']);
Route::put('/reviews/is_view/{review}', [ReviewController::class, 'isView']);
