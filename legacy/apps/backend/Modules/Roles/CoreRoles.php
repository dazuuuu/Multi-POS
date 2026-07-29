<?php

namespace App\Backend\Modules\Roles;

class CoreRoles
{
    public static function all(): array
    {
        return [
            'business_owner' => [
                'name' => 'Business Owner',
                'category' => 'core',
                'description' => 'Full access to all business modules and settings',
                'permissions' => ['business.*', 'dashboard.*', 'sales.*', 'inventory.*', 'financials.*', 'employees.*', 'reports.*'],
            ],
            'branch_manager' => [
                'name' => 'Branch Manager',
                'category' => 'core',
                'description' => 'Manage branch operations, staff, and reports',
                'permissions' => ['dashboard.view', 'sales.*', 'inventory.*', 'employees.view', 'employees.manage', 'reports.view'],
            ],
            'cashier' => [
                'name' => 'Cashier',
                'category' => 'core',
                'description' => 'Process sales, payments, and returns',
                'permissions' => ['sales.create', 'sales.view', 'sales.refund', 'customers.view', 'inventory.view'],
            ],
            'salesperson' => [
                'name' => 'Salesperson',
                'category' => 'core',
                'description' => 'Create quotes, orders, and manage customer relationships',
                'permissions' => ['sales.create', 'sales.view', 'sales.quote', 'customers.*', 'inventory.view'],
            ],
            'accountant' => [
                'name' => 'Accountant',
                'category' => 'core',
                'description' => 'Manage financials, expenses, and tax reports',
                'permissions' => ['financials.*', 'reports.view', 'reports.financial', 'purchases.view', 'sales.view'],
            ],
            'inventory_officer' => [
                'name' => 'Inventory Officer',
                'category' => 'core',
                'description' => 'Manage stock, transfers, and purchase orders',
                'permissions' => ['inventory.*', 'purchases.*', 'suppliers.view', 'reports.inventory'],
            ],
        ];
    }
}
