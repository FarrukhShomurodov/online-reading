<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Category
    {
        return Category::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Category $category, array $validated): Category
    {
        $category->update($validated);

        return $category->refresh();
    }

    public function destroy(Category $category): void
    {
        $category->delete();
    }
}
