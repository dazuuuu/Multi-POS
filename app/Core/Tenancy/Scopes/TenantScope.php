<?php

namespace App\Core\Tenancy\Scopes;

use App\Core\Tenancy\TenantContext;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $tenantId = TenantContext::id();

        if ($tenantId === null) {
            return;
        }

        $builder->where(
            $model->getTable().'.'.config('tenancy.tenant_column', 'tenant_id'),
            $tenantId
        );
    }
}
