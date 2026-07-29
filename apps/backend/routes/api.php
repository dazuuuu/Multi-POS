<?php

use App\Backend\Controllers\ModuleController;
use App\Backend\Helpers\ResponseHelper;
use App\Backend\Helpers\Router;
use App\Backend\Modules\Registry\ModuleRegistry;

$router = new Router();

$router->get('/api/health', function () {
    ResponseHelper::json(['status' => 'ok', 'platform' => 'Multi-POS', 'version' => '1.0.0']);
    return null;
});

$router->get('/api/modules', function () {
    (new ModuleController())->apiList();
    return null;
});

$router->get('/api/modules/registry', function () {
    ResponseHelper::json([
        'core' => ModuleRegistry::coreModules(),
        'industry' => ModuleRegistry::industryModules(),
        'tiers' => ModuleRegistry::subscriptionTiers(),
        'categories' => ModuleRegistry::categories(),
    ]);
    return null;
});

$router->get('/api/modules/business', function () {
    (new ModuleController())->apiBusinessModules();
    return null;
});

return $router;
