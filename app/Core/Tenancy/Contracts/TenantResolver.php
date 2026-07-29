<?php

namespace App\Core\Tenancy\Contracts;

use App\Models\Tenant;
use Illuminate\Http\Request;

interface TenantResolver
{
    public function resolve(Request $request): ?Tenant;
}
