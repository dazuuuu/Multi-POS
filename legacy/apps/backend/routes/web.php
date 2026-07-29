<?php

use App\Backend\Controllers\AdminController;
use App\Backend\Controllers\AuthController;
use App\Backend\Controllers\HomeController;
use App\Backend\Controllers\ModuleController;
use App\Backend\Helpers\Router;

$router = new Router();

// Public pages
$router->get('/', fn () => (new HomeController())->index());
$router->get('/core', fn () => (new HomeController())->coreCategory());
$router->get('/industry', fn () => (new HomeController())->industryCategory());

// Auth
$router->get('/register', fn () => (new AuthController())->showRegister());
$router->post('/register', fn () => (new AuthController())->register());
$router->get('/login', fn () => (new AuthController())->showLogin());
$router->post('/login', fn () => (new AuthController())->login());
$router->get('/logout', fn () => (new AuthController())->logout());

// Dashboard
$router->get('/dashboard', fn () => (new AdminController())->dashboard());
$router->get('/admin/dashboard', fn () => (new AdminController())->dashboard());

// Module entry pages
$allModuleKeys = array_merge(
    array_keys(\App\Backend\Modules\Registry\CoreModules::all()),
    array_keys(\App\Backend\Modules\Registry\IndustryModules::all())
);
foreach ($allModuleKeys as $moduleKey) {
    $router->get("/modules/{$moduleKey}", function () use ($moduleKey) {
        return (new ModuleController())->show($moduleKey);
    });
}

return $router;
