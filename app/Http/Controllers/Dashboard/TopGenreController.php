<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\TopGenreRequest;
use App\Models\TopGenre;
use Illuminate\Http\RedirectResponse;

class TopGenreController
{
    public function save(TopGenreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        TopGenre::query()->delete();

        foreach ($validated['genres'] as $genre) {
            TopGenre::query()->create([
                'genre_id' => $genre
            ]);
        }

        return redirect()->back();
    }
}
