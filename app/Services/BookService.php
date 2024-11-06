<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function store(array $validated): Book
    {
        $book = Book::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('book_photos', 'public');
                $book->images()->create(['url' => $path]);
            }
        }

        $book->categories()->sync($validated['categories']);
        $book->tags()->sync($validated['tags']);
        $book->genres()->sync($validated['genres']);

        return $book;
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function update(Book $book, array $validated): Book
    {
        $book->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('book_photos', 'public');
                $book->images()->create(['url' => $path]);
            }
        }

        $book->categories()->sync($validated['categories']);
        $book->tags()->sync($validated['tags']);
        $book->genres()->sync($validated['genres']);

        return $book->refresh();
    }

    public function destroy(Book $book): void
    {
        foreach ($book->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
        $book->delete();
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function updateStatus(Book $book, array $validated): void
    {
        $book->update($validated);
    }
}
