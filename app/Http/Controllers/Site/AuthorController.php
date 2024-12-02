<?php

namespace App\Http\Controllers\Site;

use App\Models\Author;
use Illuminate\Contracts\View\View;

class AuthorController
{
    public function books(Author $author): View
    {
        return view('site.pages.author_books', compact('author'));
    }
}
