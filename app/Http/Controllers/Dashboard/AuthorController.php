<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthorController
{
    protected AuthorService $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $authors = Author::query()
            ->select(['id', 'name'])
            ->orderBy('id')
            ->simplePaginate(10);

        return view('admin.authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('admin.authors.create');
    }

    public function store(AuthorRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array) $validated);

        return redirect()->route('authors.index')->with('success', 'Автор успешно добавлена!');
    }

    public function edit(Author $author): View
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($author, (array) $validated);

        return redirect()->route('authors.index')->with('success', 'Автор успешно обновлена!');
    }

    public function destroy(Author $author): RedirectResponse
    {
        $this->service->destroy($author);

        return redirect()->route('authors.index')->with('success', 'Автор успешно удалена!');
    }
}
