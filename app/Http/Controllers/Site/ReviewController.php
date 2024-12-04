<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController
{
    public function store(ReviewRequest $request): RedirectResponse
    {
        Review::query()->create($request->validated());

        return redirect()->back()->with('review_success', true);
    }
}
