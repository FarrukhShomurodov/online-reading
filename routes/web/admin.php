<?php

use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CollectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\PromotionController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\TopGenreController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm']);
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('dashboard.login');

Route::middleware('auth:admin')->group(function () {
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('admins', AdminController::class);
    Route::get('users', [UserController::class, 'index'])->name('users');

    // Books
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('genres', GenreController::class);
    Route::post('top-genres', [TopGenreController::class, 'save'])->name('genres.top.save');
    Route::resource('books', BookController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('collections', CollectionController::class);
    Route::resource('promotions', PromotionController::class);
});
