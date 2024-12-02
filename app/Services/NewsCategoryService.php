<?php

namespace App\Services;

use App\Models\NewsCategory;

class NewsCategoryService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): NewsCategory
    {
        return NewsCategory::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(NewsCategory $category, array $validated): NewsCategory
    {
        $category->update($validated);

        return $category->refresh();
    }

    public function destroy(NewsCategory $category): void
    {
        $category->delete();
    }
}
