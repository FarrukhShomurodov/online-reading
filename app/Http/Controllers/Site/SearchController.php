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
            ->where('title->ru', 'LIKE', "%$query%")
            ->get();

        $authors = Author::query()
            ->where('name->ru', 'LIKE', "%$query%")
            ->get();

        return view('site.pages.search-results', compact('books', 'authors'));
    }
}
