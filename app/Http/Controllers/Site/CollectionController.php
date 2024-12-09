<?php

namespace App\Http\Controllers\Site;

use App\Models\Author;
use App\Models\Collection;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CollectionController
{
    public function index(): View
    {
        $collections = Collection::with('images')
            ->withCount('images')
            ->orderBy('images_count', 'desc')
            ->get();
        $tags = Tag::query()->get();

        return view('site.pages.collection.index', compact('collections', 'tags'));
    }

    public function books(Collection $collection, Request $request): View
    {
        $collection->with('books');

        $authors = Author::query()->get();

        $books = $collection->books->where('is_active', true)
            ->when(
                $request->input('author_id'),
                function ($query, $authorId) {
                    return $query->where('author_id', $authorId);
                }
            )
            ->when(
                $request->input('rating'),
                function ($query, $ratting) {
                    return $query->where('ratting', $ratting);
                }
            );

        return view('site.pages.collection.books', compact('collection', 'books', 'authors'));
    }
}
