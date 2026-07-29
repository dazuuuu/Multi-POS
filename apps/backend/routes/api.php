<?php

use App\Backend\Helpers\ResponseHelper;

$router = [];

$router['/api/health'] = function () {
    return ResponseHelper::json(['status' => 'ok']);
};

return $router;
