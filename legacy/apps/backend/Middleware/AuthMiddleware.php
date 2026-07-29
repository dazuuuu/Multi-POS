<?php

namespace App\Backend\Middleware;

use App\Backend\Helpers\ResponseHelper;
use App\Backend\Services\SessionService;

class AuthMiddleware
{
    public function __construct(
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function handle(callable $next): mixed
    {
        if (!$this->sessionService->isAuthenticated()) {
            ResponseHelper::redirect('/login');
        }

        return $next();
    }
}
