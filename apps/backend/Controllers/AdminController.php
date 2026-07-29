<?php

namespace App\Backend\Controllers;

use App\Backend\Middleware\AuthMiddleware;
use App\Backend\Services\ModuleService;
use App\Backend\Services\SessionService;
use App\Backend\Services\TenantService;

class AdminController extends BaseController
{
    public function __construct(
        private SessionService $sessionService = new SessionService(),
        private ModuleService $moduleService = new ModuleService(),
        private TenantService $tenantService = new TenantService(),
    ) {
    }

    public function dashboard(): string
    {
        $middleware = new AuthMiddleware();
        return $middleware->handle(function () {
            $user = $this->sessionService->user();
            $business = $this->sessionService->business();
            $modules = [];

            if ($business) {
                $modules = $this->moduleService->getBusinessModules((int) $business['id']);
            }

            $content = $this->view('admin/dashboard', [
                'title' => 'Admin Dashboard',
                'user' => $user,
                'business' => $business,
                'modules' => $modules,
                'businesses' => $this->tenantService->getUserBusinesses((int) $user['id']),
            ]);

            return $this->layout($content, ['title' => 'Dashboard']);
        });
    }
}
