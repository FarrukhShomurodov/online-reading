<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController
{
    protected ReviewService $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    public function isView(Request $request, Review $review): JsonResponse
    {
        $validated = $request->validate(['is_view' => 'required|boolean']);

        $this->service->updateStatus($review, $validated);

        return response()->json();
    }
}
