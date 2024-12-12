<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ReviewRequest;
use App\Models\Book;
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
        $reviews = Review::query()
            ->groupBy('id')
            ->select(['id', 'name', 'last_name', 'text', 'ratting', 'is_view', 'created_at', 'book_id', 'user_id'])
            ->with(['book', 'user'])
            ->orderBy('id')
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        $books = Book::query()->where('is_active', true)->select(['id', 'title'])->get();

        return view('admin.reviews.create', compact('books'));
    }

    public function store(ReviewRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно добавлен!');
    }

    public function edit(Review $review): View
    {
        $books = Book::query()->where('is_active', true)->select(['id', 'title'])->get();

        return view('admin.reviews.edit', compact('review', 'books'));
    }

    public function update(ReviewRequest $request, Review $review): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($review, (array)$validated);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен!');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $this->service->destroy($review);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно удален!');
    }
}
