<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Dashboard
            ['name' => 'View Dashboard', 'slug' => 'dashboard.view', 'group' => 'dashboard', 'module_key' => 'core'],
            // Sales
            ['name' => 'View Sales', 'slug' => 'sales.view', 'group' => 'sales', 'module_key' => 'core'],
            ['name' => 'Create Sales', 'slug' => 'sales.create', 'group' => 'sales', 'module_key' => 'core'],
            ['name' => 'Refund Sales', 'slug' => 'sales.refund', 'group' => 'sales', 'module_key' => 'core'],
            ['name' => 'Create Quotes', 'slug' => 'sales.quote', 'group' => 'sales', 'module_key' => 'core'],
            // Inventory
            ['name' => 'View Inventory', 'slug' => 'inventory.view', 'group' => 'inventory', 'module_key' => 'core'],
            ['name' => 'Manage Inventory', 'slug' => 'inventory.manage', 'group' => 'inventory', 'module_key' => 'core'],
            // Customers
            ['name' => 'View Customers', 'slug' => 'customers.view', 'group' => 'customers', 'module_key' => 'core'],
            ['name' => 'Manage Customers', 'slug' => 'customers.manage', 'group' => 'customers', 'module_key' => 'core'],
            // Financials
            ['name' => 'View Financials', 'slug' => 'financials.view', 'group' => 'financials', 'module_key' => 'core'],
            ['name' => 'Manage Financials', 'slug' => 'financials.manage', 'group' => 'financials', 'module_key' => 'core'],
            // Reports
            ['name' => 'View Reports', 'slug' => 'reports.view', 'group' => 'reports', 'module_key' => 'core'],
            ['name' => 'Financial Reports', 'slug' => 'reports.financial', 'group' => 'reports', 'module_key' => 'core'],
            ['name' => 'Inventory Reports', 'slug' => 'reports.inventory', 'group' => 'reports', 'module_key' => 'core'],
            // Users & Branches
            ['name' => 'Manage Users', 'slug' => 'users.manage', 'group' => 'users', 'module_key' => 'core'],
            ['name' => 'Manage Branches', 'slug' => 'branches.manage', 'group' => 'branches', 'module_key' => 'core'],
            ['name' => 'Manage Roles', 'slug' => 'roles.manage', 'group' => 'roles', 'module_key' => 'core'],
            // Settings
            ['name' => 'Manage Settings', 'slug' => 'settings.manage', 'group' => 'settings', 'module_key' => 'core'],
            // Healthcare
            ['name' => 'View Patients', 'slug' => 'patients.view', 'group' => 'healthcare', 'module_key' => 'healthcare'],
            ['name' => 'Manage Patients', 'slug' => 'patients.manage', 'group' => 'healthcare', 'module_key' => 'healthcare'],
            ['name' => 'Dispense Prescriptions', 'slug' => 'prescriptions.dispense', 'group' => 'healthcare', 'module_key' => 'healthcare'],
        ];

        foreach ($permissions as $permission) {
            Permission::query()->updateOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }
    }
}
