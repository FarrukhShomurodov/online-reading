<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Tag
    {
        return Tag::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Tag $tag, array $validated): Tag
    {
        $tag->update($validated);

        return $tag->refresh();
    }

    public function destroy(Tag $tag): void
    {
        $tag->delete();
    }
}
