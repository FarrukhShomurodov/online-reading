<?php

namespace App\Http\Controllers\Site;

use App\Models\Genre;
use Illuminate\Contracts\View\View;

class GenreController
{
    public function showGenres()
    {
        $genres = Genre::with('images') // Загружаем связанные изображения
        ->withCount('images')      // Подсчитываем количество изображений
        ->orderBy('images_count', 'desc') // Сортируем по количеству изображений
        ->get();

        return view('genres', compact('genres'));
    }


    public function books(Genre $genre): View
    {
        $genre->with('books');
        return view('site.pages.genre_books', compact('genre'));
    }
}
