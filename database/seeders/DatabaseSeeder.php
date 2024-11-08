<?php

namespace Database\Seeders;

use App\Models\Admin;
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
    }
}
