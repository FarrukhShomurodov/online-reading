<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\TopGenre;
use Illuminate\Contracts\View\View;

class MainPage
{
    public function index(): View
    {
        $genres = Genre::query()->get();
        $topGenres = TopGenre::query()->get();
        $categories = Category::query()->get();
        $collections = Collection::query()->get();

        return view('site.index', compact('genres', 'categories', 'topGenres', 'collections'));
    }
}
