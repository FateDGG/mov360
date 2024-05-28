<?php

use App\Http\Middleware\AdminLocked;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            
            'RedirectIfNotAuthenticated' => RedirectIfNotAuthenticated::class,
            'AdminLocked' => AdminLocked::class,

        ]);




    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
