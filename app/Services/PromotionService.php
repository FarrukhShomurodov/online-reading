<?php

namespace App\Services;

use App\Models\Promotion;

class PromotionService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function update(Promotion $promotion, array $validated): Promotion
    {
        $promotion->update($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('promotion_photos', 'public');
                $promotion->images()->create(['url' => $path]);
            }
        }

        return $promotion->refresh();
    }

    /**
     * @param array<string, mixed> $validated
     */
    public function store(array $validated): Promotion
    {
        $promotion = Promotion::query()->create($validated);

        if (isset($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                $path = $photo->store('promotion_photos', 'public');
                $promotion->images()->create(['url' => $path]);
            }
        }

        return $promotion;
    }

    public function destroy(Promotion $promotion): void
    {
        $promotion->delete();
    }
}
