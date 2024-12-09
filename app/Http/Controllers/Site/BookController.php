<?php

namespace App\Http\Controllers\Site;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class BookController
{
    public function show(Book $book): View
    {
        $books = Book::query()->where('is_active', true)->get();
        $reviews = $book->reviews()->where('is_view', true)->get();

        return view('site.pages.book-info', compact('book', 'books', 'reviews'));
    }

    public function read(Book $book): View
    {
        $user = Auth::guard('user')->user();
        $user->load('books');

        $userBook = $user->books->where('book_id', $book->id)->first();

        if (!$userBook) {
            $user->books()->create([
                'book_id' => $book->id
            ]);
        }

        return view('site.flipbook.index', compact('book'));
    }

    public function markAsRead(Book $book): RedirectResponse
    {
        $user = Auth::guard('user')->user();

        $user->load('readBooks');

        $userBook = $user->readBooks->where('book_id', $book->id)->first();

        if (!$userBook) {
            $user->readBooks()->create([
                'book_id' => $book->id
            ]);
        }

        return redirect(route('show.read.books'))->with('add_mark_as_read_success', true);
    }
}
