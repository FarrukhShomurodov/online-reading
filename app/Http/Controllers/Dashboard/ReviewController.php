<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController
{
    protected ReviewService $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $reviews = Review::query()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        return view('admin.reviews.create');
    }

    public function store(ReviewRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array) $validated);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно добавлен!');
    }

    public function edit(Review $review): View
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request, Review $review): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($review, (array) $validated);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен!');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $this->service->destroy($review);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно удален!');
    }
}
