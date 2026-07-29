<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Business Owner',
                'slug' => 'business_owner',
                'category' => 'core',
                'is_system' => true,
                'permissions' => Permission::pluck('slug')->all(),
            ],
            [
                'name' => 'Branch Manager',
                'slug' => 'branch_manager',
                'category' => 'core',
                'is_system' => true,
                'permissions' => [
                    'dashboard.view', 'sales.view', 'sales.create', 'sales.refund',
                    'inventory.view', 'inventory.manage', 'customers.view',
                    'reports.view', 'users.manage',
                ],
            ],
            [
                'name' => 'Cashier',
                'slug' => 'cashier',
                'category' => 'core',
                'is_system' => true,
                'permissions' => [
                    'dashboard.view', 'sales.view', 'sales.create', 'sales.refund',
                    'customers.view', 'inventory.view',
                ],
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'category' => 'core',
                'is_system' => true,
                'permissions' => [
                    'dashboard.view', 'financials.view', 'financials.manage',
                    'reports.view', 'reports.financial', 'sales.view',
                ],
            ],
            [
                'name' => 'Doctor',
                'slug' => 'doctor',
                'category' => 'healthcare',
                'module_key' => 'healthcare',
                'is_system' => true,
                'permissions' => ['patients.view', 'patients.manage', 'prescriptions.dispense'],
            ],
        ];

        foreach ($roles as $roleData) {
            $permissionSlugs = $roleData['permissions'];
            unset($roleData['permissions']);

            $role = Role::query()->updateOrCreate(
                ['slug' => $roleData['slug'], 'tenant_id' => null],
                $roleData
            );

            $permissionIds = Permission::whereIn('slug', $permissionSlugs)->pluck('id');
            $role->permissions()->sync($permissionIds);
        }
    }
}
