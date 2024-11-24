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
        $books = $genre->books()
            ->with(['images', 'author'])
            ->withCount('images')
            ->orderBy('images_count', 'desc')
            ->get();
        return view('site.pages.genre_books', compact('genre', 'books'));
    }
}
