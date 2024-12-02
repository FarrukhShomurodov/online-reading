<?php

namespace App\Http\Controllers\Site;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController
{
    public function store(Request $request): RedirectResponse
    {
        Review::query()->create([
            'book_id' => $request->input('book_id'),
            'user_id' => $request->input('user_id'),
            'text' => $request->input('text'),
            'ratting' => $request->input('ratting'),
            'is_view' => false,
        ]);

        return redirect()->back();
    }
}
