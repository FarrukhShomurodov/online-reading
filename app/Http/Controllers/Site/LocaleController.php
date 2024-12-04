<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\App;

class LocaleController
{
    public function changeLocale($locale)
    {
        $supportedLocales = ['ru', 'uz'];

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
