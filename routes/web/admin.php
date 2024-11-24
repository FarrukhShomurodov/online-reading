<?php

use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CollectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\NewsCategoryController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\PromotionController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\TopGenreController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('dashboard.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('dashboard.login');

Route::prefix('dashboard')->middleware('auth:admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('admins', AdminController::class);
    Route::get('users', [UserController::class, 'index'])->name('users');

    // Books and book relations
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('genres', GenreController::class);
    Route::post('genres', [TopGenreController::class, 'save'])->name('genres.top.save');
    Route::resource('books', BookController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('collections', CollectionController::class);
    Route::resource('authors', AuthorController::class);

    // Promotion
    Route::resource('promotions', PromotionController::class);

    //News
    Route::resource('news', NewsController::class);
    Route::resource('news-categories', NewsCategoryController::class)->parameter('news-categories', 'category');
});
