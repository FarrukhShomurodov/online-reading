<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('user')->user();

        if ($user && !$user->is_active) {
            return response()->view('site.pages.user_ban');
        }

        return $next($request);
    }
}
