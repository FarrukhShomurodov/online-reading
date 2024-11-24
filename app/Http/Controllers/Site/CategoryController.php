<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController
{
    public function index(): View
    {
        $categories = Category::query()->get();
        return view('site.pages.categories', compact('categories'));
    }

    public function books(Category $category): View
    {
        $category->with('books');
        return view('site.pages.category_books', compact('category'));
    }
}
