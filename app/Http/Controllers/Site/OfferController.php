<?php

namespace App\Http\Controllers\Site;

use App\Models\NewsCategory;
use App\Models\Promotion;
use Illuminate\Contracts\View\View;

class OfferController
{
    public function index(): View
    {
        $newsCategories = NewsCategory::query()->get();
        $promocodes = Promotion::query()->get();

        return view('site.pages.offer', compact('newsCategories', 'promocodes'));
    }
}
