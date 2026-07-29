<?php

namespace App\Services\Rbac;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Cache;

class PermissionService extends BaseService
{
    public function userHasPermission(User $user, string $permission, ?int $branchId = null): bool
    {
        if ($user->is_owner) {
            return true;
        }

        $permissions = $this->getUserPermissions($user, $branchId);

        return in_array($permission, $permissions, true) || in_array('*', $permissions, true);
    }

    public function getUserPermissions(User $user, ?int $branchId = null): array
    {
        $cacheKey = "user_permissions:{$user->id}:".($branchId ?? 'all');

        return Cache::remember($cacheKey, 300, function () use ($user, $branchId) {
            $rolePermissions = $user->roles()
                ->with('permissions')
                ->when($branchId, fn ($q) => $q->where(function ($q) use ($branchId) {
                    $q->whereNull('role_user.branch_id')->orWhere('role_user.branch_id', $branchId);
                }))
                ->get()
                ->flatMap(fn (Role $role) => $role->permissions->pluck('slug'))
                ->all();

            $direct = $user->permissions()
                ->when($branchId, fn ($q) => $q->where(function ($q) use ($branchId) {
                    $q->whereNull('permission_user.branch_id')->orWhere('permission_user.branch_id', $branchId);
                }))
                ->get();

            $granted = $direct->where('pivot.is_granted', true)->pluck('slug')->all();
            $denied = $direct->where('pivot.is_granted', false)->pluck('slug')->all();

            return array_values(array_diff(array_unique(array_merge($rolePermissions, $granted)), $denied));
        });
    }

    public function forgetUserCache(User $user): void
    {
        Cache::forget("user_permissions:{$user->id}:all");
    }

    public function syncRolePermissions(Role $role, array $permissionSlugs): void
    {
        $ids = Permission::query()->whereIn('slug', $permissionSlugs)->pluck('id');
        $role->permissions()->sync($ids);
    }

    public function assignRole(User $user, Role $role, ?int $branchId = null): void
    {
        $user->roles()->syncWithoutDetaching([
            $role->id => ['branch_id' => $branchId],
        ]);
        $this->forgetUserCache($user);
    }
}
