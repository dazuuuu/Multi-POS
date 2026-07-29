<?php

namespace App\Backend\Controllers;

use App\Backend\Modules\Registry\ModuleRegistry;
use App\Backend\Services\ModuleService;
use App\Backend\Services\SessionService;

class HomeController extends BaseController
{
    public function __construct(
        private ModuleService $moduleService = new ModuleService(),
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function index(): string
    {
        $content = $this->view('home/index', [
            'title' => 'Multi-POS — SaaS Point of Sale Platform',
            'categories' => ModuleRegistry::categories(),
            'coreModules' => ModuleRegistry::coreModules(),
            'industryModules' => ModuleRegistry::industryModules(),
            'tiers' => ModuleRegistry::subscriptionTiers(),
            'user' => $this->sessionService->user(),
        ]);

        return $this->layout($content, ['title' => 'Multi-POS']);
    }

    public function coreCategory(): string
    {
        $content = $this->view('home/core-category', [
            'title' => 'Core System Modules',
            'modules' => ModuleRegistry::coreModules(),
            'user' => $this->sessionService->user(),
        ]);

        return $this->layout($content, ['title' => 'Core System']);
    }

    public function industryCategory(): string
    {
        $content = $this->view('home/industry-category', [
            'title' => 'Industry Modules',
            'modules' => ModuleRegistry::industryModules(),
            'user' => $this->sessionService->user(),
        ]);

        return $this->layout($content, ['title' => 'Industry Modules']);
    }
}
