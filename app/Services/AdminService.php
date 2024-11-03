<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function store(array $validated): Model|Builder
    {
        return DB::transaction(function () use ($validated) {
            $validated['password'] = Hash::make($validated['password']);
            return Admin::query()->create($validated);
        });
    }

    public function update(Admin $admin, array $validated): Admin
    {
        return DB::transaction(function () use ($admin, $validated) {
            $validated['password'] = $validated['password'] ? Hash::make($validated['password']) : $admin->password;
            $admin->update($validated);
            return $admin->refresh();
        });
    }

    public function destroy(Admin $admin): void
    {
        DB::transaction(function () use ($admin) {
            $admin->delete();
        });
    }
}
