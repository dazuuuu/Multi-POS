<?php

namespace App\Backend\Middleware;

use App\Backend\Helpers\ResponseHelper;
use App\Backend\Services\ModuleService;
use App\Backend\Services\SessionService;

class ModuleMiddleware
{
    public function __construct(
        private ModuleService $moduleService = new ModuleService(),
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function handle(string $moduleKey, callable $next): mixed
    {
        $business = $this->sessionService->business();
        if (!$business) {
            ResponseHelper::redirect('/login');
        }

        if (!$this->moduleService->hasModule((int) $business['id'], $moduleKey)) {
            http_response_code(403);
            return ResponseHelper::html('errors/403', [
                'title' => 'Module Not Enabled',
                'module' => $moduleKey,
            ]);
        }

        return $next();
    }
}
