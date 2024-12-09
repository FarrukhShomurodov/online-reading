<?php

use App\Http\Middleware\SetLocale;
use App\Http\Middleware\UserStatus;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web/admin.php',
            __DIR__ . '/../routes/web/user.php',
        ],
        api: __DIR__ . '/../routes/api/routes.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (\Illuminate\Http\Request $request) {
            $guard = $request->header('guard');
            if ($guard == 'user') {
                route('auth.view');
            } else {
                route('dashboard.login');
            }
        });

        $middleware->web([
            UserStatus::class,
            SetLocale::class,
        ]);
    })->withExceptions(function (Exceptions $exceptions) {
    })->create();
