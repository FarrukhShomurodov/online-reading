<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

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

    public function books(Category $category): View
    {
        $category->with('books');

        return view('site.pages.category.books', compact('category'));
    }
}
