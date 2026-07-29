<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Backend\Helpers\Database;
use App\Backend\Services\MigrationService;

date_default_timezone_set('UTC');

$config = require \FilePaths::appPath('config/app.php');
date_default_timezone_set($config['timezone']);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$migrationService = new MigrationService();
$migrationService->runPending();

Database::connection();

$roleService = new \App\Backend\Services\RoleService();
$roleService->seedRoles();
