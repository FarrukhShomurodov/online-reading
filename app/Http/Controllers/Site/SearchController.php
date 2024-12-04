<?php

namespace App\Http\Controllers\Site;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController
{
    public function search(Request $request): View
    {
        $query = $request->input('query');

        $books = Book::query()
            ->where('title->ru', 'ILIKE', "%$query%")
            ->where('is_active', true)
            ->get();

        $authors = Author::query()
            ->where('name->ru', 'ILIKE', "%$query%")
            ->get();

        return view('site.pages.search-results', compact('books', 'authors'));
    }
}
