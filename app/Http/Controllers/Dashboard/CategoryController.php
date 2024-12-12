<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController
{
    protected CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $categories = Category::query()
            ->select(['id', 'name'])
            ->orderBy('id')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('categories.index')->with('success', 'Категория успешно добавлена!');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($category, (array)$validated);

        return redirect()->route('categories.index')->with('success', 'Категория успешно обновлена!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->service->destroy($category);

        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена!');
    }
}
