<?php

use App\Http\Controllers\Api\V1\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('/health', HealthController::class)->name('health');

Route::get('/modules', function () {
    $manager = app(\App\Modules\ModuleManager::class);

    return \App\Core\Api\ApiResponse::success([
        'modules' => config('modules'),
        'registered' => $manager->features(),
    ]);
})->name('modules.index');
