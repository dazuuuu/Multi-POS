<?php

namespace App\Modules\Core;

use App\Modules\Contracts\ModuleInterface;

class CoreModule implements ModuleInterface
{
    public function key(): string
    {
        return config('modules.core.key', 'core');
    }

    public function name(): string
    {
        return config('modules.core.name', 'Core POS');
    }

    public function features(): array
    {
        return config('modules.core.features', []);
    }

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
