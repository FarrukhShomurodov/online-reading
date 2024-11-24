<?php

namespace App\Http\Controllers\Site;

use App\Models\Genre;
use Illuminate\Contracts\View\View;

class GenreController
{
    public function index(): View
    {
        $genres = Genre::query()->get();
        return view('site.pages.genres', compact('genres'));
    }

    public function books(Genre $genre): View
    {
        $genre->with('books');
        return view('site.pages.genre_books', compact('genre'));
    }
}
