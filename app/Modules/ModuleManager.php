<?php

namespace App\Modules;

use App\Modules\Contracts\ModuleInterface;
use Illuminate\Support\Collection;

class ModuleManager
{
    /** @var Collection<string, ModuleInterface> */
    private Collection $modules;

    public function __construct()
    {
        $this->modules = collect();
    }

    public function register(ModuleInterface $module): void
    {
        $this->modules->put($module->key(), $module);
    }

    public function all(): Collection
    {
        return $this->modules;
    }

    public function get(string $key): ?ModuleInterface
    {
        return $this->modules->get($key);
    }

    public function isRegistered(string $key): bool
    {
        return $this->modules->has($key);
    }

    public function features(): array
    {
        return $this->modules
            ->mapWithKeys(fn (ModuleInterface $module) => [$module->key() => $module->features()])
            ->all();
    }
}
