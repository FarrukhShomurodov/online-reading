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

class BookController
{
    protected BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $books = Book::query()->groupBy('id')->get();

        return view('admin.books.index', compact('books'));
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
