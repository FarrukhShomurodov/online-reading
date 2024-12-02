<?php

namespace App\Http\Controllers\Site;

use App\Models\Promotion;
use Illuminate\Contracts\View\View;

class PromotionController
{
    public function show(Promotion $promotion): View
    {
        return view('site.pages.promotion_info', compact('promotion'));
    }
}
