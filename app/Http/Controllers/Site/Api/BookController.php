<?php

namespace App\Http\Controllers\Site\Api;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController
{
    public function show(Book $book): JsonResponse
    {
        $book->load('author');
        return response()->json($book);
    }
}
