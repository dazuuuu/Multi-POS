<?php

namespace App\Modules\Contracts;

interface ModuleInterface
{
    public function key(): string;

    public function name(): string;

    public function features(): array;

    public function register(): void;

    public function boot(): void;
}
