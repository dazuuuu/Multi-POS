<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use App\Services\Rbac\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends ApiController
{
    public function __construct(
        private readonly PermissionService $permissions,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $users = User::query()
            ->where('tenant_id', $request->user()->tenant_id)
            ->with('roles')
            ->latest()
            ->paginate(15);

        return $this->success(UserResource::collection($users)->response()->getData(true));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:50'],
            'role_ids' => ['nullable', 'array'],
            'role_ids.*' => ['integer', 'exists:roles,id'],
            'branch_id' => ['nullable', 'integer', 'exists:branches,id'],
        ]);

        $user = User::query()->create([
            'tenant_id' => $request->user()->tenant_id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'] ?? null,
            'is_active' => true,
            'is_owner' => false,
            'email_verified_at' => now(),
            'force_password_change' => true,
        ]);

        foreach ($data['role_ids'] ?? [] as $roleId) {
            $user->roles()->attach($roleId, ['branch_id' => $data['branch_id'] ?? null]);
        }

        return $this->created(new UserResource($user->load('roles')));
    }

    public function show(int $id): JsonResponse
    {
        $user = User::query()->with('roles')->findOrFail($id);

        return $this->success(new UserResource($user));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'is_active' => ['sometimes', 'boolean'],
        ]);
        $user->update($data);

        return $this->success(new UserResource($user->fresh('roles')));
    }

    public function destroy(int $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);
        if ($user->is_owner) {
            return $this->error('Cannot delete the tenant owner.', 422);
        }
        $user->delete();

        return $this->success(null, 'User deleted.');
    }

    public function resetPassword(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::query()->findOrFail($id);
        $user->update([
            'password' => $data['password'],
            'force_password_change' => true,
            'password_changed_at' => now(),
        ]);
        $user->tokens()->delete();

        return $this->success(null, 'Password reset. User must change password on next login.');
    }

    public function assignRoles(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'roles' => ['required', 'array'],
            'roles.*.role_id' => ['required', 'integer', 'exists:roles,id'],
            'roles.*.branch_id' => ['nullable', 'integer', 'exists:branches,id'],
        ]);

        $user = User::query()->findOrFail($id);
        $sync = [];
        foreach ($data['roles'] as $role) {
            $sync[$role['role_id']] = ['branch_id' => $role['branch_id'] ?? null];
        }
        $user->roles()->sync($sync);
        $this->permissions->forgetUserCache($user);

        return $this->success(new UserResource($user->fresh('roles')));
    }
}
