<?php

use App\Backend\Controllers\ModuleController;
use App\Backend\Controllers\RoleController;
use App\Backend\Helpers\ResponseHelper;
use App\Backend\Helpers\Router;
use App\Backend\Modules\ModuleLoader;
use App\Backend\Modules\Registry\ModuleRegistry;

$router = new Router();

$router->get('/api/health', function () {
    ResponseHelper::json(['status' => 'ok', 'platform' => 'Multi-POS', 'version' => '1.0.0']);
});

$router->get('/api/modules', function () {
    (new ModuleController())->apiList();
});

$router->get('/api/modules/registry', function () {
    ResponseHelper::json([
        'core' => ModuleRegistry::coreModules(),
        'industry' => ModuleRegistry::industryModules(),
        'tiers' => ModuleRegistry::subscriptionTiers(),
        'categories' => ModuleRegistry::categories(),
    ]);
});

$router->get('/api/modules/business', function () {
    (new ModuleController())->apiBusinessModules();
});

$router->get('/api/modules/structure', function () {
    ResponseHelper::json(ModuleLoader::listModules());
});

$router->get('/api/roles', function () {
    (new RoleController())->index();
});

$router->get('/api/roles/category/(category)', function (array $params) {
    (new RoleController())->byCategory($params['category']);
});

$router->get('/api/roles/module/(moduleKey)', function (array $params) {
    (new RoleController())->byModule($params['moduleKey']);
});

ModuleLoader::registerRoutes($router);

return $router;
