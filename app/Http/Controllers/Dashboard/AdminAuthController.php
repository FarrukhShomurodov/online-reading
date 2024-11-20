<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminAuthController
{
    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => ['required', 'string', Password::min(8)],
        ]);

        return Auth::guard('admin')->attempt($credentials) ? redirect()->route(
            'dashboard'
        ) : back()->withErrors(['login' => 'Неверные данные для входа в систему']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('dashboard.login');
    }
}
