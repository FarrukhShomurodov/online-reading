<?php


use App\Http\Controllers\Site\BookController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\GenreController;
use App\Http\Controllers\Site\MainPage;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPage::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/genre-books/{genre}', [GenreController::class, 'books'])->name('genre-books');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book-show');
