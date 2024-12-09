<?php

namespace App\Http\Controllers\Site;

use App\Models\Author;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function books(Genre $genre, Request $request): View
    {
        $genre->with('books');
        $authors = Author::query()->get();

        $books = $genre->books->where('is_active', true)
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
        return view('site.pages.genre.books', compact('genre', 'authors', 'books'));
    }
}
