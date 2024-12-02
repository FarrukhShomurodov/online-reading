<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Services\NewsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController
{
    protected NewsService $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $news = News::query()
            ->select(['id', 'title', 'news_category_id'])
            ->with('category')
            ->orderBy('id')
            ->simplePaginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        $categories = NewsCategory::query()->select('id', 'name')->get();

        return view('admin.news.create', compact('categories'));
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array) $validated);

        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена!');
    }

    public function edit(News $news): View
    {
        $categories = NewsCategory::query()->select('id', 'name')->get();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($news, (array) $validated);

        return redirect()->route('news.index')->with('success', 'Новость успешно обновлена!');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->service->destroy($news);

        return redirect()->route('news.index')->with('success', 'Новость успешно удалена!');
    }
}
