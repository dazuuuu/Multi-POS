<?php

use App\Http\Controllers\Api\V1\HealthController;
use App\Http\Controllers\Api\V1\Tenancy\TenantController;
use App\Http\Controllers\Api\V1\Tenancy\TenantRegistrationController;
use App\Modules\ModuleManager;
use App\Core\Api\ApiResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes (no tenant required)
|--------------------------------------------------------------------------
*/

Route::get('/health', HealthController::class)->name('health');

Route::get('/modules', function () {
    $manager = app(ModuleManager::class);

    return ApiResponse::success([
        'modules' => config('modules'),
        'registered' => $manager->features(),
    ]);
})->name('modules.index');

Route::post('/tenants/register', [TenantRegistrationController::class, 'store'])
    ->middleware('throttle:auth')
    ->name('tenants.register');

/*
|--------------------------------------------------------------------------
| Tenant-scoped routes (X-Tenant-ID required)
|--------------------------------------------------------------------------
*/

Route::middleware(['tenant'])->group(function () {
    Route::get('/tenant', [TenantController::class, 'current'])->name('tenant.current');
    Route::get('/tenant/branches', [TenantController::class, 'branches'])->name('tenant.branches');
});
