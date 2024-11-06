<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    /**
     * @param  array<string, mixed>  $validated
     */
    public function store(array $validated): Admin
    {
        return DB::transaction(function () use ($validated) {
            if (isset($validated['password'])) {
                $validated['password'] = Hash::make((string) $validated['password']);
            }

            return Admin::query()->create($validated);
        });
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public function update(Admin $admin, array $validated): Admin
    {
        return DB::transaction(function () use ($admin, $validated) {
            if (isset($validated['password']) && $validated['password'] !== '') {
                $validated['password'] = Hash::make((string) $validated['password']);
            } else {
                unset($validated['password']);
            }

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
