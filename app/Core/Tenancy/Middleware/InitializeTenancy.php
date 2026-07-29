<?php

namespace App\Core\Tenancy\Middleware;

use App\Core\Api\ApiResponse;
use App\Core\Tenancy\Contracts\TenantResolver;
use App\Core\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InitializeTenancy
{
    public function __construct(
        private readonly TenantResolver $resolver,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $tenant = $this->resolver->resolve($request);

        if ($tenant === null) {
            return ApiResponse::error(
                'Tenant context is required. Provide the tenant identifier header.',
                400,
                'TENANT_REQUIRED'
            );
        }

        if (! $tenant->is_active) {
            return ApiResponse::forbidden('This tenant account is suspended.');
        }

        TenantContext::set($tenant);

        $branchHeader = $request->header('X-Branch-ID');
        if ($branchHeader !== null && $branchHeader !== '') {
            TenantContext::setBranch((int) $branchHeader);
        }

        return $next($request);
    }
}
