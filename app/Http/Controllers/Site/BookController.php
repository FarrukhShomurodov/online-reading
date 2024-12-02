<?php

namespace App\Http\Controllers\Site;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class BookController
{
    public function show(Book $book): View
    {
        $books = Book::query()->get();
        $reviews = $book->reviews()->where('is_view', true)->get();

        return view('site.pages.book-info', compact('book', 'books', 'reviews'));
    }

    public function read(Book $book): View
    {
        $user = Auth::guard('user')->user();

        UserBook::query()->create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        return view('site.flipbook.index', compact('book'));
    }
}
