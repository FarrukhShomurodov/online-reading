<?php

namespace App\Services;

use App\Models\Genre;

class GenreService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Genre
    {
        return Genre::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Genre $genre, array $validated): Genre
    {
        $genre->update($validated);

        return $genre->refresh();
    }

    public function destroy(Genre $genre): void
    {
        $genre->delete();
    }
}
