<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Auth\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserAuthController
{
    public function register(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['sms_code'] = implode('', $validated['sms_code']);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        Auth::guard('user')->login($user);

        return redirect()->back();
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'phone_number' => 'required|string',
            'password' => ['required', 'string', Password::min(8)],
        ]);

        return Auth::guard('user')->attempt($credentials) ? redirect()->back() : back()->withErrors(
            ['login' => 'Неверные данные для входа в систему']
        );
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('user')->logout();

        return redirect()->back();
    }
}
