<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Review
    {
        return Review::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Review $review, array $validated): Review
    {
        $review->update($validated);

        return $review->refresh();
    }

    public function destroy(Review $review): void
    {
        $review->delete();
    }
}
