<?php

namespace App\Http\Controllers\Site;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class CollectionController
{
    public function index(): View
    {
        $collections = Collection::query()->get();
        return view('site.pages.collections', compact('collections'));
    }

    public function books(Collection $collection): View
    {
        $collection->with('books');
        return view('site.pages.collection_books', compact('collection'));
    }
}
