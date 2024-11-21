<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\View\View;

class ContactController
{
    public function index(): View
    {
        return view('site.pages.contacts');
    }
}
