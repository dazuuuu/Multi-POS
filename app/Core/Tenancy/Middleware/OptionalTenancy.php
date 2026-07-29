<?php

namespace App\Core\Tenancy\Middleware;

use App\Core\Tenancy\Contracts\TenantResolver;
use App\Core\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Soft tenancy: resolve tenant if header present, otherwise continue without tenant context.
 */
class OptionalTenancy
{
    public function __construct(
        private readonly TenantResolver $resolver,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $tenant = $this->resolver->resolve($request);

        if ($tenant !== null && $tenant->is_active) {
            TenantContext::set($tenant);

            $branchHeader = $request->header('X-Branch-ID');
            if ($branchHeader !== null && $branchHeader !== '') {
                TenantContext::setBranch((int) $branchHeader);
            }
        }

        try {
            return $next($request);
        } finally {
            TenantContext::clear();
        }
    }
}
