<?php

namespace App\Http\Controllers\Site;

use App\Models\Tag;
use Illuminate\Contracts\View\View;

class TagControler
{
    public function books(Tag $tag): View
    {
        $tag->with('books');
        return view('site.pages.tag_books', compact('tag'));
    }
}
