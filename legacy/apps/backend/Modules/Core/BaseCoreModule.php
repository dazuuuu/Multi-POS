<?php

namespace App\Backend\Modules\Core;

abstract class BaseCoreModule
{
    protected string $moduleKey;
    protected array $config;

    public function __construct(string $moduleKey)
    {
        $this->moduleKey = $moduleKey;
        $this->config = \App\Backend\Modules\Registry\ModuleRegistry::getModule($moduleKey) ?? [];
    }

    public function getKey(): string
    {
        return $this->moduleKey;
    }

    public function getName(): string
    {
        return $this->config['name'] ?? $this->moduleKey;
    }

    public function getFeatures(): array
    {
        return $this->config['features'] ?? [];
    }

    abstract public function getRoutes(): array;

    public function isEnabled(int $businessId): bool
    {
        $service = new \App\Backend\Services\ModuleService();
        return $service->hasModule($businessId, $this->moduleKey);
    }
}
