<?php

namespace App\Http\Controllers\Site;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class RoomController
{
    public function index(): View
    {
        $user = Auth::guard('user')->user();
        $user->load('books');
        $books = $user->books;

        return view('site.pages.room', compact('user', 'books'));
    }

    public function showReadBooks(Book $book): View
    {
        $user = Auth::guard('user')->user();
        $user->load('readBooks');
        $books = $user->readBooks;

        return view('site.pages.room', compact('user', 'books'));
    }
}
