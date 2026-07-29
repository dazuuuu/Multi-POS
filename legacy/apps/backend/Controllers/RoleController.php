<?php

namespace App\Backend\Controllers;

use App\Backend\Modules\Roles\RoleRegistry;
use App\Backend\Services\RoleService;

class RoleController extends BaseController
{
    public function __construct(
        private RoleService $roleService = new RoleService(),
    ) {
    }

    public function index(): void
    {
        \App\Backend\Helpers\ResponseHelper::json([
            'roles' => RoleRegistry::all(),
            'categories' => RoleRegistry::categories(),
        ]);
    }

    public function byCategory(string $category): void
    {
        \App\Backend\Helpers\ResponseHelper::json([
            'category' => $category,
            'roles' => RoleRegistry::byCategory($category),
        ]);
    }

    public function byModule(string $moduleKey): void
    {
        \App\Backend\Helpers\ResponseHelper::json([
            'module' => $moduleKey,
            'roles' => RoleRegistry::byModule($moduleKey),
        ]);
    }
}
