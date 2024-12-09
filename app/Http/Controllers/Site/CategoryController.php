<?php

namespace App\Http\Controllers\Site;

use App\Models\Author;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(): View
    {
        $categories = Category::with('images')
            ->withCount('images')
            ->orderBy('images_count', 'desc')
            ->get();

        $tags = Tag::query()->get();
        $collections = Collection::query()->get();

        return view('site.pages.category.index', compact('categories', 'tags', 'collections'));
    }

    public function books(Category $category, Request $request): View
    {
        $authors = Author::query()->get();
        $books = $category->books->where('is_active', true)
            ->when(
                $request->input('author_id'),
                function ($query, $authorId) {
                    return $query->where('author_id', $authorId);
                }
            )
            ->when(
                $request->input('rating'),
                function ($query, $ratting) {
                    return $query->where('rating', $ratting);
                }
            );

        return view('site.pages.category.books', compact('category', 'authors', 'books'));
    }
}
