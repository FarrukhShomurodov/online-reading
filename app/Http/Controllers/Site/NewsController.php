<?php

namespace App\Http\Controllers\Site;

use App\Models\News;
use Illuminate\Contracts\View\View;

class NewsController
{
    public function show(News $news): View
    {
        return view('site.pages.news_info', compact('news'));
    }
}
