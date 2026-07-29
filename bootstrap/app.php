<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        apiPrefix: 'api',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            \App\Http\Middleware\ForceJsonResponse::class,
            \App\Http\Middleware\SecureHeaders::class,
        ]);

        $middleware->alias([
            'tenant' => \App\Core\Tenancy\Middleware\InitializeTenancy::class,
            'tenant.optional' => \App\Core\Tenancy\Middleware\OptionalTenancy::class,
            'tenant.user' => \App\Core\Tenancy\Middleware\EnsureUserBelongsToTenant::class,
            'permission' => \App\Http\Middleware\EnsurePermission::class,
            'owner' => \App\Http\Middleware\EnsureOwner::class,
        ]);

        $middleware->throttleApi();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        \App\Exceptions\ApiExceptionHandler::register($exceptions);
    })->create();
