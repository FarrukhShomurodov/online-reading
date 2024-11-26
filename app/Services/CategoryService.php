<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function store(array $validated): Category
    {
        $category = Category::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('category_photos', 'public');
                $category->images()->create(['url' => $path]);
            }
        }

        return $category;
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function update(Category $category, array $validated): Category
    {
        $category->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('category_photos', 'public');
                $category->images()->create(['url' => $path]);
            }
        }

        return $category->refresh();
    }

    public function destroy(Category $category): void
    {
        foreach ($category->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        $category->delete();
    }
}
