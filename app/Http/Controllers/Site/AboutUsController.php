<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\View\View;

class AboutUsController
{
    public function index(): View
    {
        return view('site.pages.about-us');
    }
}
