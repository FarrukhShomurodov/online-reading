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

        $files = [];

        if (isset($validated['files']['ru'])) {
            $pathRu = $validated['files']['ru']->store('book_files', 'public');
            $files['ru'] = $pathRu;
        }

        if (isset($validated['files']['uz'])) {
            $pathUz = $validated['files']['uz']->store('book_files', 'public');
            $files['uz'] = $pathUz;
        }

        $book->update(['files' => $files]);

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
        $files = $book->files ?? [];

        $book->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('book_photos', 'public');
                $book->images()->create(['url' => $path]);
            }
        }

        if (isset($validated['files']['ru'])) {
            if (isset($files['ru']) && Storage::disk('public')->exists($files['ru'])) {
                Storage::disk('public')->delete($files['ru']);
            }
            $pathRu = $validated['files']['ru']->store('book_files', 'public');
            $files['ru'] = $pathRu;
        }

        if (isset($validated['files']['uz'])) {
            if (isset($files['uz']) && Storage::disk('public')->exists($files['uz'])) {
                Storage::disk('public')->delete($files['uz']);
            }
            $pathUz = $validated['files']['uz']->store('book_files', 'public');
            $files['uz'] = $pathUz;
        }

        $book->update(['files' => $files]);

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
        if ($book->files) {
            Storage::disk('public')->delete($book->files['uz']);
            Storage::disk('public')->delete($book->files['ru']);
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
