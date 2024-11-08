<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationMiddlewareBase;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

    $middleware->alias([
        'localization' =>  LaravelLocalizationMiddlewareBase::class,
    ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
