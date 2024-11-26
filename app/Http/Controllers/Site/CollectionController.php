<?php

namespace App\Http\Controllers\Site;

use App\Models\Book;
use App\Models\Collection;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class CollectionController
{
    public function index(): View
    {
        $collections = Collection::with('images')
            ->withCount('images')
            ->orderBy('images_count', 'desc')
            ->get();
        $tags = Tag::query()->get();


        return view('site.pages.collections', compact('collections', 'tags'));
    }

    public function books(Collection $collection): View
    {
        $collection->with('books');
        $books = Book::query()->get();
        return view('site.pages.collection_books', compact('collection', 'books'));
    }
}
