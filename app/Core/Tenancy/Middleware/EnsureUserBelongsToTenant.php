<?php

namespace App\Core\Tenancy\Middleware;

use App\Core\Api\ApiResponse;
use App\Core\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensures the authenticated user belongs to the current tenant.
 */
class EnsureUserBelongsToTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $tenantId = TenantContext::id();

        if ($user === null || $tenantId === null) {
            return ApiResponse::unauthorized();
        }

        if ((int) $user->tenant_id !== (int) $tenantId) {
            return ApiResponse::forbidden('You do not have access to this tenant.');
        }

        if (! $user->is_active) {
            return ApiResponse::forbidden('Your account has been deactivated.');
        }

        if (method_exists($user, 'isLocked') && $user->isLocked()) {
            return ApiResponse::forbidden('Your account is temporarily locked.');
        }

        return $next($request);
    }
}
