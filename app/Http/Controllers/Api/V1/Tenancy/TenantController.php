<?php

namespace App\Http\Controllers\Api\V1\Tenancy;

use App\Core\Tenancy\TenantContext;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Api\V1\BranchResource;
use App\Http\Resources\Api\V1\TenantResource;
use App\Models\Branch;
use App\Models\TenantModule;
use Illuminate\Http\JsonResponse;

class TenantController extends ApiController
{
    public function current(): JsonResponse
    {
        $tenant = TenantContext::get();

        if ($tenant === null) {
            return $this->error('Tenant context is required.', 400, 'TENANT_REQUIRED');
        }

        $modules = TenantModule::query()
            ->where('tenant_id', $tenant->id)
            ->where('is_enabled', true)
            ->pluck('module_key');

        return $this->success([
            'tenant' => new TenantResource($tenant),
            'branch_id' => TenantContext::branchId(),
            'modules' => $modules,
        ]);
    }

    public function branches(): JsonResponse
    {
        $branches = Branch::query()
            ->where('is_active', true)
            ->orderByDesc('is_main')
            ->orderBy('name')
            ->get();

        return $this->success(BranchResource::collection($branches));
    }
}
