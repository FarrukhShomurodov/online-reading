<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class AuthorService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Author
    {
        $author = Author::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('author_photos', 'public');
                $author->images()->create(['url' => $path]);
            }
        }

        return $author;
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Author $author, array $validated): Author
    {
        $author->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('author_photos', 'public');
                $author->images()->create(['url' => $path]);
            }
        }

        return $author->refresh();
    }

    public function destroy(Author $author): void
    {
        foreach ($author->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        $author->delete();
    }
}
