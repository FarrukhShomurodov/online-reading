<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function isActive(Request $request, string $id): JsonResponse
    {
        $user = User::query()->find($id);

        $validated = $request->validate(['is_active' => 'required|boolean']);

        if ($user) {
            $this->userService->updateStatus($user, $validated);
        } else {
            return response()->json('Пользователь не найден', 404);
        }

        return response()->json();
    }
}
