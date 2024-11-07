<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Tag;
use App\Services\BookService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController
{
    protected BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $categories = Category::query()->get();
        $genres = Genre::query()->get();
        $tags = Tag::query()->get();

        $books = Book::query()
            ->when($request->input('category_id'), function ($query) use ($request) {
                $query->whereHas('categories', function ($q) use ($request) {
                    $q->where('category_id', $request->input('category_id'));
                });
            })
            ->when($request->input('genre_id'), function ($query) use ($request) {
                $query->whereHas('genres', function ($q) use ($request) {
                    $q->where('genre_id', $request->input('genre_id'));
                });
            })
            ->when($request->input('tag_id'), function ($query) use ($request) {
                $query->whereHas('tags', function ($q) use ($request) {
                    $q->where('tag_id', $request->input('tag_id'));
                });
            })
            ->orderBy('id')
            ->get();

        return view('admin.books.index', compact('books', 'categories', 'genres', 'tags'));
    }

    public function create(): View
    {
        $categories = Category::query()->get();
        $genres = Genre::query()->get();
        $tags = Tag::query()->get();
        return view('admin.books.create', compact('categories', 'genres', 'tags'));
    }

    public function store(BookRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('books.index')->with('success', 'Книга успешно добавлена!');
    }

    public function edit(Book $book): View
    {
        $categories = Category::query()->get();
        $genres = Genre::query()->get();
        $tags = Tag::query()->get();
        return view('admin.books.edit', compact('book', 'categories', 'genres', 'tags'));
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($book, (array)$validated);

        return redirect()->route('books.index')->with('success', 'Книга успешно обновлена!');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $this->service->destroy($book);

        return redirect()->route('books.index')->with('success', 'Книга успешно удалена!');
    }
}
