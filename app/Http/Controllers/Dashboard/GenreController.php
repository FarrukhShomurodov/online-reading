<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Models\TopGenre;
use App\Services\GenreService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GenreController
{
    protected GenreService $service;

    public function __construct(GenreService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $genres = Genre::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->paginate(10);

        $allGenres = Genre::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->get();

        $topGenres = TopGenre::query()->pluck('genre_id')->toArray();

        return view('admin.genres.index', compact('genres', 'topGenres', 'allGenres'));
    }

    public function create(): View
    {
        return view('admin.genres.create');
    }

    public function store(GenreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('genres.index')->with('success', 'Жанр успешно добавлен!');
    }

    public function edit(Genre $genre): View
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($genre, (array)$validated);

        return redirect()->route('genres.index')->with('success', 'Жанр успешно обновлен!');
    }

    public function destroy(Genre $genre): RedirectResponse
    {
        $this->service->destroy($genre);

        return redirect()->route('genres.index')->with('success', 'Жанр успешно удален!');
    }
}
