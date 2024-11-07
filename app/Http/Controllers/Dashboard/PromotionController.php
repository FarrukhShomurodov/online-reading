<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use App\Services\PromotionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PromotionController
{
    protected PromotionService $service;

    public function __construct(PromotionService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $promotions = Promotion::query()->get();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create(): View
    {
        return view('admin.promotions.create');
    }

    public function store(PromotionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);
        return redirect()->route('promotions.index')->with('success', 'Акция успешно добавлена!');
    }

    public function edit(Promotion $promotion): View
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(PromotionRequest $request, Promotion $promotion): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($promotion, (array)$validated);

        return redirect()->route('promotions.index')->with('success', 'Акция успешно обновлена!');
    }

    public function destroy(Promotion $promotion): RedirectResponse
    {
        $this->service->destroy($promotion);

        return redirect()->route('promotions.index')->with('success', 'Акция успешно удалена!');
    }
}
