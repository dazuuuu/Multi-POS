<?php

namespace App\Providers;

use App\Core\Tenancy\Contracts\TenantResolver;
use App\Core\Tenancy\Resolvers\HeaderTenantResolver;
use App\Modules\ModuleManager;
use Illuminate\Support\ServiceProvider;

class TenancyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TenantResolver::class, HeaderTenantResolver::class);
        $this->app->singleton(ModuleManager::class);
    }

    public function boot(): void
    {
        //
    }
}
