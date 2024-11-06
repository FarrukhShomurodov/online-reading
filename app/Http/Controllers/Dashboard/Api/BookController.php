<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController
{
    protected BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function isActive(Request $request, Book $book): JsonResponse
    {
        $validated = $request->validate(['is_active' => 'required|boolean']);

        $this->service->updateStatus($book, $validated);

        return response()->json();
    }
}
