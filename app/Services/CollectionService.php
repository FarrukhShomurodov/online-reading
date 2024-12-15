<?php

namespace App\Services;

use App\Models\Collection;
use Illuminate\Support\Facades\Storage;

class CollectionService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function store(array $validated): Collection
    {
        $collection = Collection::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('collection_photos', 'public');
                $collection->images()->create(['url' => $path]);
            }
        }

        if (isset($validated['books'])) {
            $collection->books()->sync($validated['books']);
        }

        return $collection;
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function update(Collection $collection, array $validated): Collection
    {
        $collection->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('collection_photos', 'public');
                $collection->images()->create(['url' => $path]);
            }
        }

        if (isset($validated['books'])) {
            $collection->books()->detach();

            foreach ($validated['books'] as $bookId) {
                $collection->books()->attach($bookId);
            }
        }

        return $collection->refresh();
    }

    public function destroy(Collection $collection): void
    {
        foreach ($collection->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
        $collection->delete();
    }
}
