<?php

use App\Http\Controllers\Site\AboutUsController;
use App\Http\Controllers\Site\AuthorController;
use App\Http\Controllers\Site\BookController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CollectionController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\GenreController;
use App\Http\Controllers\Site\MainPage;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\OfferController;
use App\Http\Controllers\Site\PromotionController;
use App\Http\Controllers\Site\ReviewController;
use App\Http\Controllers\Site\RoomController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\TagController;
use App\Http\Controllers\Site\UserAuthController;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('user-register', [UserAuthController::class, 'register'])->name('user.register');
Route::post('user-login', [UserAuthController::class, 'login'])->name('user.login');
Route::get('auth', [UserAuthController::class, 'auth'])->name('auth.view');

Route::middleware('auth:user')->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::get('room', [RoomController::class, 'index'])->name('room');
    Route::post('review', [ReviewController::class, 'store'])->name('review.store');

    Route::get('mark-as-read/{book}', [BookController::class, 'markAsRead'])->name('mark.as.read');
    Route::get('get-reed-books', [RoomController::class, 'showReadBooks'])->name('show.read.books');
});

Route::get('/', [MainPage::class, 'index'])->name('main');
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('book/{book}', [BookController::class, 'show'])->name('book.show');

// Genre
Route::get('genres', [GenreController::class, 'index'])->name('genres');
Route::get('genre-books/{genre}', [GenreController::class, 'books'])->name('genre.books');

// Category
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category-books/{category}', [CategoryController::class, 'books'])->name('category.books');

//Collection
Route::get('collections', [CollectionController::class, 'index'])->name('collections');
Route::get('collection-books/{collection}', [CollectionController::class, 'books'])->name('collection.books');

// AboutUs
Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');

// Offer
Route::get('offer', [OfferController::class, 'index'])->name('offer');

// Search
Route::get('search', [SearchController::class, 'search'])->name('search');

//Tag
Route::get('tag-books/{tag}', [TagController::class, 'books'])->name('tag.books');

//News
Route::get('news/{news}', [NewsController::class, 'show'])->name('news');

//Promotion
Route::get('promotion/{promotion}', [PromotionController::class, 'show'])->name('promotion');

//Author
Route::get('author-books/{author}', [AuthorController::class, 'books'])->name('author.books');

Route::get('flip-book{book}', [BookController::class, 'read'])->name('read.book');
