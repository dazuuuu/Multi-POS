<?php

namespace App\Core\Tenancy\Resolvers;

use App\Core\Tenancy\Contracts\TenantResolver;
use App\Models\Tenant;
use Illuminate\Http\Request;

class HeaderTenantResolver implements TenantResolver
{
    public function resolve(Request $request): ?Tenant
    {
        $header = config('tenancy.identification.header', 'X-Tenant-ID');
        $tenantId = $request->header($header);

        if ($tenantId === null || $tenantId === '') {
            return null;
        }

        return Tenant::query()
            ->where('id', $tenantId)
            ->where('is_active', true)
            ->first();
    }
}
