<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\NewsCategoryRequest;
use App\Models\NewsCategory;
use App\Services\NewsCategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsCategoryController
{
    protected NewsCategoryService $service;

    public function __construct(NewsCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $categories = NewsCategory::query()
            ->select(['id', 'name'])
            ->orderBy('id')
            ->simplePaginate(10);

        return view('admin.news-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.news-categories.create');
    }

    public function store(NewsCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('news-categories.index')->with('success', 'Категория успешно добавлена!');
    }

    public function edit(NewsCategory $category): View
    {
        return view('admin.news-categories.edit', compact('category'));
    }

    public function update(NewsCategoryRequest $request, NewsCategory $category): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($category, (array)$validated);

        return redirect()->route('news-categories.index')->with('success', 'Категория успешно обновлена!');
    }

    public function destroy(NewsCategory $category): RedirectResponse
    {
        $this->service->destroy($category);
        return redirect()->route('news-categories.index')->with('success', 'Категория успешно удалена!');
    }
}
