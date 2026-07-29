<?php

namespace App\Backend\Controllers;

use App\Backend\Middleware\AuthMiddleware;
use App\Backend\Middleware\ModuleMiddleware;
use App\Backend\Services\ModuleService;
use App\Backend\Services\SessionService;

class ModuleController extends BaseController
{
    public function __construct(
        private ModuleService $moduleService = new ModuleService(),
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function show(string $moduleKey): string
    {
        $middleware = new AuthMiddleware();
        return $middleware->handle(function () use ($moduleKey) {
            $moduleMiddleware = new ModuleMiddleware();
            return $moduleMiddleware->handle($moduleKey, function () use ($moduleKey) {
                $moduleData = $this->moduleService->getModuleHomeData($moduleKey);
                if (!$moduleData) {
                    http_response_code(404);
                    return $this->layout(
                        $this->view('errors/404', ['title' => 'Module Not Found', 'path' => $moduleKey]),
                        ['title' => 'Not Found']
                    );
                }

                $template = $moduleData['category'] === 'industry'
                    ? 'modules/industry-home'
                    : 'modules/core-home';

                $content = $this->view($template, [
                    'title' => $moduleData['name'],
                    'module' => $moduleData,
                    'user' => $this->sessionService->user(),
                    'business' => $this->sessionService->business(),
                ]);

                return $this->layout($content, ['title' => $moduleData['name']]);
            });
        });
    }

    public function apiList(): void
    {
        $registry = $this->moduleService->getRegistry();
        \App\Backend\Helpers\ResponseHelper::json($registry);
    }

    public function apiBusinessModules(): void
    {
        $business = $this->sessionService->business();
        if (!$business) {
            \App\Backend\Helpers\ResponseHelper::json(['error' => 'No business context'], 401);
            return;
        }

        $modules = $this->moduleService->getBusinessModules((int) $business['id']);
        \App\Backend\Helpers\ResponseHelper::json(['modules' => $modules]);
    }
}
