<?php

use App\Backend\Controllers\AdminController;

$router = [];

$router['/admin/dashboard'] = function () {
    $controller = new AdminController();
    return $controller->dashboard();
};

return $router;
