<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd(Auth::getDefaultDriver());
//        if ($guard && !Auth::guard($guard)->check()) {
//            if ($guard == 'user') {
//                return redirect()->route('auth.view');
//            } elseif ($guard == 'admin') {
//                return redirect()->route('dashboard.login');
//            }
//        }

        return $next($request);
    }
}
