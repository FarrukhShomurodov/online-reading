<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $users = User::query()
            ->select(['id', 'name', 'last_name', 'phone_number', 'is_active', 'created_at'])
            ->simplePaginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->service->update($user, $validated);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлен!');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->service->destroy($user);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно удален!');
    }
}
