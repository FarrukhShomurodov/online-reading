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
        $collections = Collection::query()
            ->select(['id', 'name', 'created_at'])
            ->with('books:title,id')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.collections.index', compact('collections'));
    }

    public function create(): View
    {
        $books = Book::select('id', 'title')
            ->where('is_active', true)
            ->with(['images:id,imageable_id,url'])
            ->get()
            ->map(function ($book) {
                $book->first_image_url = $book->images->first() ? asset(
                    'storage/' . $book->images->first()->url
                ) : null;

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

    public function edit(Collection $collection)
    {
        $books = Book::select('id', 'title')
            ->where('is_active', true)
            ->with(['images:id,imageable_id,url'])
            ->get()
            ->map(function ($book) {
                $book->first_image_url = $book->images->first() ? asset(
                    'storage/' . $book->images->first()->url
                ) : null;

                return $book;
            });

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
        if (collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->contains($collection->id)) {
            return redirect()->back()->withErrors('Удаление этой подборки недоступно.');
        }

        $this->service->destroy($collection);

        return redirect()->route('collections.index')->with('success', 'Колекция успешно удалена!');
    }
}
