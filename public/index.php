<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

require \FilePaths::backendPath('bootstrap.php');

use App\Backend\Helpers\Router;

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

/** @var Router $webRouter */
$webRouter = require \FilePaths::backendPath('routes/web.php');
/** @var Router $apiRouter */
$apiRouter = require \FilePaths::backendPath('routes/api.php');

$path = parse_url($uri, PHP_URL_PATH) ?: '/';

if (str_starts_with($path, '/api')) {
    echo $apiRouter->dispatch($method, $uri);
} else {
    echo $webRouter->dispatch($method, $uri);
}
