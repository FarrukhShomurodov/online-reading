<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Genre;
use Illuminate\Contracts\View\View;

class GenreController
{
    public function books(Genre $genre): View
    {
        $genre->with('books');
        $categories = Category::query()->get();
        $collections = Collection::query()->get();
        return view('site.pages.genre_books', compact('genre', 'collections', 'categories'));
    }
}
