<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function store(array $validated): Author
    {
        return Author::query()->create($validated);
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function update(Author $author, array $validated): Author
    {
        $author->update($validated);
        return $author->refresh();
    }

    public function destroy(Author $author): void
    {
        $author->delete();
    }
}
