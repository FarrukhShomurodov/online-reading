<?php


use App\Http\Controllers\Site\AboutUsController;
use App\Http\Controllers\Site\BookController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CollectionController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\GenreController;
use App\Http\Controllers\Site\MainPage;
use App\Http\Controllers\Site\OfferController;
use App\Http\Controllers\Site\RoomController;
use App\Http\Controllers\Site\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPage::class, 'index']);
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('book/{book}', [BookController::class, 'show'])->name('book-show');

// Genre
Route::get('genres', [GenreController::class, 'index']);
Route::get('genre-books/{genre}', [GenreController::class, 'books'])->name('genre-books');


// Category
Route::get('categories', [CategoryController::class, 'index']);
Route::get('category-books/{category}', [CategoryController::class, 'books'])->name('category-books');


//Collection
Route::get('collections', [CollectionController::class, 'index']);
Route::get('collection-books/{collection}', [CollectionController::class, 'books'])->name('collection-books');


// Room
Route::get('room', [RoomController::class, 'index']);

// AboutUs
Route::get('aboutus', [AboutUsController::class, 'index'])->name('about-us');

// Offer
Route::get('offer', [OfferController::class, 'index'])->name('offer');

// Search
Route::get('search', [SearchController::class, 'search'])->name('search');
