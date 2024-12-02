<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::query()->create([
            'email' => 'online@gmail.com',
            'password' => Hash::make('online@gmail.com'),
        ]);
        // Collection
        // 1
        Collection::query()->create([
            'name' => [
                'ru' => 'топ 10 за неделю',
                'uz' => 'топ 10 за неделю',
            ],
            'description' => [
                'ru' => 'топ 10 за неделю',
                'uz' => 'топ 10 за неделю',
            ],
        ]);

        // 2
        Collection::query()->create([
            'name' => [
                'ru' => 'Лучшая книга месяца',
                'uz' => 'Лучшая книга месяца',
            ],
            'description' => [
                'ru' => 'Лучшая книга месяца',
                'uz' => 'Лучшая книга месяца',
            ],
        ]);

        // 3
        Collection::query()->create([
            'name' => [
                'ru' => '30 Самых читаемых книг по версии наших читателей!',
                'uz' => '30 Самых читаемых книг по версии наших читателей!',
            ],
            'description' => [
                'ru' => '30 Самых читаемых книг по версии наших читателей!',
                'uz' => '30 Самых читаемых книг по версии наших читателей!',
            ],
        ]);

        // 4
        Collection::query()->create([
            'name' => [
                'ru' => 'Новинки',
                'uz' => 'Новинки',
            ],
            'description' => [
                'ru' => 'Новинки',
                'uz' => 'Новинки',
            ],
        ]);

        // 5
        Collection::query()->create([
            'name' => [
                'ru' => 'Популярные книги по жанрам',
                'uz' => 'Популярные книги по жанрам',
            ],
            'description' => [
                'ru' => 'Популярные книги по жанрам',
                'uz' => 'Популярные книги по жанрам',
            ],
        ]);

        // 6
        Collection::query()->create([
            'name' => [
                'ru' => 'Рекомендации на основе жанра',
                'uz' => 'Рекомендации на основе жанра',
            ],
            'description' => [
                'ru' => 'Рекомендации на основе жанра',
                'uz' => 'Рекомендации на основе жанра',
            ],
        ]);

        // 7
        Collection::query()->create([
            'name' => [
                'ru' => 'Подборка книг по жанрам',
                'uz' => 'Подборка книг по жанрам',
            ],
            'description' => [
                'ru' => 'Подборка книг по жанрам',
                'uz' => 'Подборка книг по жанрам',
            ],
        ]);

        // 8
        Collection::query()->create([
            'name' => [
                'ru' => 'Популярные книги в категориях',
                'uz' => 'Популярные книги в категориях',
            ],
            'description' => [
                'ru' => 'Популярные книги в категориях',
                'uz' => 'Популярные книги в категориях',
            ],
        ]);

        // 9
        Collection::query()->create([
            'name' => [
                'ru' => 'Рекомендации по категориям',
                'uz' => 'Рекомендации по категориям',
            ],
            'description' => [
                'ru' => 'Рекомендации по категориям',
                'uz' => 'Рекомендации по категориям',
            ],
        ]);

        // 10
        Collection::query()->create([
            'name' => [
                'ru' => 'Тематические подборки',
                'uz' => 'Тематические подборки',
            ],
            'description' => [
                'ru' => 'Тематические подборки',
                'uz' => 'Тематические подборки',
            ],
        ]);
    }
}
