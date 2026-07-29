<?php

require_once dirname(__DIR__) . '/apps/config/filePaths.php';

require_once FilePaths::backendPath('controllers/BaseController.php');
require_once FilePaths::backendPath('controllers/AdminController.php');
require_once FilePaths::backendPath('helpers/ResponseHelper.php');
require_once FilePaths::backendPath('services/AuthService.php');
require_once FilePaths::backendPath('models/BaseModel.php');
require_once FilePaths::publicPath('components/admin/DashboardCard.php');
require_once FilePaths::publicPath('components/shared/Header.php');

use App\Backend\Controllers\AdminController;
use App\Public\Components\Admin\DashboardCard;
use App\Public\Components\Shared\Header;

$controller = new AdminController();
echo Header::render('Multi POS');
echo DashboardCard::render('Sales', '120');
echo $controller->dashboard();
