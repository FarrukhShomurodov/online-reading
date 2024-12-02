<?php

namespace App\Services;

use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class GenreService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Genre
    {
        $genre = Genre::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('genre_photos', 'public');
                $genre->images()->create(['url' => $path]);
            }
        }

        return $genre;
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Genre $genre, array $validated): Genre
    {
        $genre->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('genre_photos', 'public');
                $genre->images()->create(['url' => $path]);
            }
        }

        return $genre->refresh();
    }

    public function destroy(Genre $genre): void
    {
        foreach ($genre->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
        $genre->delete();
    }
}
