<?php

namespace App\Services;

use App\Models\News;

class NewsService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(News $news, array $validated): News
    {
        $news->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('news_photos', 'public');
                $news->images()->create(['url' => $path]);
            }
        }

        return $news->refresh();
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): News
    {
        $news = News::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('news_photos', 'public');
                $news->images()->create(['url' => $path]);
            }
        }

        return $news;
    }

    public function destroy(News $news): void
    {
        $news->delete();
    }
}
