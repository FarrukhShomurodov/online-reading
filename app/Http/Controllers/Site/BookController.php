<?php

namespace App\Http\Controllers\Site;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController
{
    public function show(Book $book): View
    {
        $books = Book::query()->get();
        return view('site.pages.book-info', compact('book', 'books'));
    }
}
