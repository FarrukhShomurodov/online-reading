<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController
{
    protected TagService $service;

    public function __construct(TagService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $tags = Tag::query()->get();

        return view('admin.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->store((array)$validated);

        return redirect()->route('tags.index')->with('success', 'Тег успешно добавлен!');
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($tag, (array)$validated);

        return redirect()->route('tags.index')->with('success', 'Тег успешно обновлен!');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $this->service->destroy($tag);

        return redirect()->route('tags.index')->with('success', 'Тег успешно удален!');
    }
}
