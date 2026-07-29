<?php

namespace App\Http\Middleware;

use App\Core\Api\ApiResponse;
use App\Core\Tenancy\TenantContext;
use App\Services\Rbac\PermissionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePermission
{
    public function __construct(
        private readonly PermissionService $permissions,
    ) {}

    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = $request->user();

        if (! $user) {
            return ApiResponse::unauthorized();
        }

        if (! $this->permissions->userHasPermission($user, $permission, TenantContext::branchId())) {
            return ApiResponse::forbidden("Missing permission: {$permission}");
        }

        return $next($request);
    }
}
