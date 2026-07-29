<?php

namespace App\Backend\Modules\Roles;

class PlatformRoles
{
    public static function all(): array
    {
        return [
            'super_admin' => [
                'name' => 'Super Admin',
                'category' => 'platform',
                'description' => 'Full platform access across all tenants',
                'permissions' => ['*'],
            ],
        ];
    }
}
