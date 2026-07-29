<?php

namespace App\Backend\Modules\Core\MultiBranch;

class MultiBranchModule
{
    public const MODULE_KEY = 'multi_branch';

    public static function features(): array
    {
        return [
            'unlimited_branches',
            'branch_inventory',
            'branch_transfers',
            'branch_reports',
            'branch_managers',
            'branch_expenses',
            'central_warehouse',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/multi_branch/unlimited_branches' => [Controllers\UnlimitedBranchesController::class, 'index'],
            'POST /api/modules/multi_branch/unlimited_branches' => [Controllers\UnlimitedBranchesController::class, 'store'],
            'GET /api/modules/multi_branch/unlimited_branches/{id}' => [Controllers\UnlimitedBranchesController::class, 'show'],
            'PUT /api/modules/multi_branch/unlimited_branches/{id}' => [Controllers\UnlimitedBranchesController::class, 'update'],
            'DELETE /api/modules/multi_branch/unlimited_branches/{id}' => [Controllers\UnlimitedBranchesController::class, 'destroy'],
            'GET /api/modules/multi_branch/branch_inventory' => [Controllers\BranchInventoryController::class, 'index'],
            'POST /api/modules/multi_branch/branch_inventory' => [Controllers\BranchInventoryController::class, 'store'],
            'GET /api/modules/multi_branch/branch_inventory/{id}' => [Controllers\BranchInventoryController::class, 'show'],
            'PUT /api/modules/multi_branch/branch_inventory/{id}' => [Controllers\BranchInventoryController::class, 'update'],
            'DELETE /api/modules/multi_branch/branch_inventory/{id}' => [Controllers\BranchInventoryController::class, 'destroy'],
            'GET /api/modules/multi_branch/branch_transfers' => [Controllers\BranchTransfersController::class, 'index'],
            'POST /api/modules/multi_branch/branch_transfers' => [Controllers\BranchTransfersController::class, 'store'],
            'GET /api/modules/multi_branch/branch_transfers/{id}' => [Controllers\BranchTransfersController::class, 'show'],
            'PUT /api/modules/multi_branch/branch_transfers/{id}' => [Controllers\BranchTransfersController::class, 'update'],
            'DELETE /api/modules/multi_branch/branch_transfers/{id}' => [Controllers\BranchTransfersController::class, 'destroy'],
            'GET /api/modules/multi_branch/branch_reports' => [Controllers\BranchReportsController::class, 'index'],
            'POST /api/modules/multi_branch/branch_reports' => [Controllers\BranchReportsController::class, 'store'],
            'GET /api/modules/multi_branch/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'show'],
            'PUT /api/modules/multi_branch/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'update'],
            'DELETE /api/modules/multi_branch/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'destroy'],
            'GET /api/modules/multi_branch/branch_managers' => [Controllers\BranchManagersController::class, 'index'],
            'POST /api/modules/multi_branch/branch_managers' => [Controllers\BranchManagersController::class, 'store'],
            'GET /api/modules/multi_branch/branch_managers/{id}' => [Controllers\BranchManagersController::class, 'show'],
            'PUT /api/modules/multi_branch/branch_managers/{id}' => [Controllers\BranchManagersController::class, 'update'],
            'DELETE /api/modules/multi_branch/branch_managers/{id}' => [Controllers\BranchManagersController::class, 'destroy'],
            'GET /api/modules/multi_branch/branch_expenses' => [Controllers\BranchExpensesController::class, 'index'],
            'POST /api/modules/multi_branch/branch_expenses' => [Controllers\BranchExpensesController::class, 'store'],
            'GET /api/modules/multi_branch/branch_expenses/{id}' => [Controllers\BranchExpensesController::class, 'show'],
            'PUT /api/modules/multi_branch/branch_expenses/{id}' => [Controllers\BranchExpensesController::class, 'update'],
            'DELETE /api/modules/multi_branch/branch_expenses/{id}' => [Controllers\BranchExpensesController::class, 'destroy'],
            'GET /api/modules/multi_branch/central_warehouse' => [Controllers\CentralWarehouseController::class, 'index'],
            'POST /api/modules/multi_branch/central_warehouse' => [Controllers\CentralWarehouseController::class, 'store'],
            'GET /api/modules/multi_branch/central_warehouse/{id}' => [Controllers\CentralWarehouseController::class, 'show'],
            'PUT /api/modules/multi_branch/central_warehouse/{id}' => [Controllers\CentralWarehouseController::class, 'update'],
            'DELETE /api/modules/multi_branch/central_warehouse/{id}' => [Controllers\CentralWarehouseController::class, 'destroy'],
        ];
    }
}
