<?php

namespace App\Core\Tenancy\Resolvers;

use App\Core\Tenancy\Contracts\TenantResolver;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeaderTenantResolver implements TenantResolver
{
    public function resolve(Request $request): ?Tenant
    {
        $header = config('tenancy.identification.header', 'X-Tenant-ID');
        $identifier = $request->header($header);

        if ($identifier === null || $identifier === '') {
            return null;
        }

        $query = Tenant::query();

        if (Str::isUuid($identifier)) {
            return $query->where('uuid', $identifier)->first();
        }

        if (ctype_digit((string) $identifier)) {
            return $query->where('id', (int) $identifier)->first();
        }

        return $query->where('slug', $identifier)->first();
    }
}
