<?php

namespace App\Http\Controllers\Api\V1\Rbac;

use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Permission;
use App\Models\Role;
use App\Services\Rbac\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends ApiController
{
    public function __construct(
        private readonly PermissionService $permissions,
    ) {}

    public function index(): JsonResponse
    {
        $roles = Role::query()
            ->where(function ($q) {
                $q->whereNull('tenant_id')->orWhere('tenant_id', auth()->user()->tenant_id);
            })
            ->with('permissions')
            ->orderBy('name')
            ->get();

        return $this->success($roles);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', 'exists:permissions,slug'],
        ]);

        $role = Role::query()->create([
            'tenant_id' => $request->user()->tenant_id,
            'name' => $data['name'],
            'slug' => $data['slug'],
            'category' => 'core',
            'description' => $data['description'] ?? null,
            'is_system' => false,
        ]);

        if (! empty($data['permissions'])) {
            $this->permissions->syncRolePermissions($role, $data['permissions']);
        }

        return $this->created($role->load('permissions'));
    }

    public function show(int $id): JsonResponse
    {
        return $this->success(Role::query()->with('permissions')->findOrFail($id));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $role = Role::query()->findOrFail($id);
        if ($role->is_system && $role->tenant_id === null) {
            return $this->error('System roles cannot be modified.', 422);
        }

        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', 'exists:permissions,slug'],
        ]);

        $role->update(collect($data)->only(['name', 'description'])->all());

        if (array_key_exists('permissions', $data)) {
            $this->permissions->syncRolePermissions($role, $data['permissions'] ?? []);
        }

        return $this->success($role->fresh('permissions'));
    }

    public function destroy(int $id): JsonResponse
    {
        $role = Role::query()->findOrFail($id);
        if ($role->is_system) {
            return $this->error('System roles cannot be deleted.', 422);
        }
        $role->delete();

        return $this->success(null, 'Role deleted.');
    }

    public function permissions(): JsonResponse
    {
        return $this->success(Permission::query()->orderBy('group')->orderBy('name')->get());
    }
}
