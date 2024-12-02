<?php

namespace App\Http\Controllers\Site;

use App\Models\Collection;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class GenreController
{
    public function index(): View
    {
        $genres = Genre::with('images')
            ->withCount('images')
            ->orderBy('images_count', 'desc')
            ->get();

        $tags = Tag::query()->get();

        $collections = Collection::query()->get();

        return view('site.pages.genre.index', compact('genres', 'tags', 'collections'));
    }

    public function books(Genre $genre): View
    {
        $genre->with('books');

        return view('site.pages.genre.books', compact('genre'));
    }
}
