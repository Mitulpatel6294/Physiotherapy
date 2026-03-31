<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function ($exceptions) {
        $exceptions->render(function (ThrottleRequestsException $e, $request) {

            return redirect()->back()->withErrors([
                'throttle' => 'Too many attempts. Try again after some time.'
            ]);
        });
    })
    ->withProviders([
        App\Providers\EventServiceProvider::class,
    ])->create();
