<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CollectionRequest;
use App\Models\Book;
use App\Models\Collection;
use App\Services\CollectionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CollectionController
{
    protected CollectionService $service;

    public function __construct(CollectionService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $collections = Collection::query()->get();
        return view('admin.collections.index', compact('collections'));
    }

    public function create(): View
    {
        $books = Book::with('images')->get()->map(function ($book) {
            $book->first_image_url = $book->images->first() ? asset('storage/' . $book->images->first()->url) : null;
            return $book;
        });
        return view('admin.collections.create', compact('books'));
    }

    public function store(CollectionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);
        return redirect()->route('collections.index')->with('success', 'Колекция успешно добавлена!');
    }

    public function edit(Collection $collection): View
    {
        $books = Book::query()->get();
        return view('admin.collections.edit', compact('collection', 'books'));
    }

    public function update(CollectionRequest $request, Collection $collection): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($collection, (array)$validated);

        return redirect()->route('collections.index')->with('success', 'Колекция успешно обновлена!');
    }

    public function destroy(Collection $collection): RedirectResponse
    {
        $this->service->destroy($collection);

        return redirect()->route('collections.index')->with('success', 'Колекция успешно удалена!');
    }
}
