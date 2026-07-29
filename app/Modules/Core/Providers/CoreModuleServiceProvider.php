<?php

namespace App\Modules\Core\Providers;

use App\Modules\Core\CoreModule;
use App\Modules\ModuleManager;
use Illuminate\Support\ServiceProvider;

class CoreModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->afterResolving(ModuleManager::class, function (ModuleManager $manager): void {
            $manager->register(new CoreModule);
        });
    }

    public function boot(): void
    {
        //
    }
}
