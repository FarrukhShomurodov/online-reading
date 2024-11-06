<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param array<string, mixed> $validated
     */
    public function updateStatus(User $user, array $validated): void
    {
        $user->update($validated);
    }

    /**
     * @param User $user
     * @param array<string, mixed> $validated
     * @return User
     */
    public function update(User $user, array $validated): User
    {
        $user->update($validated);
        return $user->refresh();
    }

    /**
     * @param User $user
     * @return void
     */
    public function destroy(User $user): void
    {
        $user->delete();
    }
}
