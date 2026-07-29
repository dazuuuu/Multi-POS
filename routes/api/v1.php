<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\HealthController;
use App\Http\Controllers\Api\V1\Notifications\NotificationController;
use App\Http\Controllers\Api\V1\Rbac\RoleController;
use App\Http\Controllers\Api\V1\Reports\ReportController;
use App\Http\Controllers\Api\V1\Tenancy\TenantController;
use App\Http\Controllers\Api\V1\Tenancy\TenantRegistrationController;
use App\Http\Controllers\Api\V1\Users\UserController;
use App\Core\Api\ApiResponse;
use App\Modules\ModuleManager;
use Illuminate\Support\Facades\Route;

Route::get('/health', HealthController::class)->name('health');

Route::get('/modules', function () {
    return ApiResponse::success([
        'modules' => config('modules'),
        'registered' => app(ModuleManager::class)->features(),
    ]);
})->name('modules.index');

Route::post('/tenants/register', [TenantRegistrationController::class, 'store'])
    ->middleware('throttle:auth')
    ->name('tenants.register');

Route::prefix('auth')->middleware('throttle:auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/2fa/verify', [AuthController::class, 'verifyTwoFactor']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::put('/profile', [AuthController::class, 'updateProfile']);
        Route::put('/password', [AuthController::class, 'changePassword']);
        Route::post('/2fa/enable', [AuthController::class, 'enableTwoFactor']);
        Route::post('/2fa/confirm', [AuthController::class, 'confirmTwoFactor']);
        Route::post('/2fa/disable', [AuthController::class, 'disableTwoFactor']);
        Route::post('/2fa/email-otp', [AuthController::class, 'sendEmailOtp']);
        Route::get('/devices', [AuthController::class, 'devices']);
        Route::delete('/devices/{id}', [AuthController::class, 'revokeDevice']);
        Route::get('/login-history', [AuthController::class, 'loginHistory']);
        Route::get('/tokens', [AuthController::class, 'tokens']);
        Route::delete('/tokens/{id}', [AuthController::class, 'revokeToken']);
    });

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllRead']);
});

Route::middleware(['auth:sanctum', 'tenant', 'tenant.user'])->group(function () {
    Route::get('/tenant', [TenantController::class, 'current']);
    Route::get('/tenant/branches', [TenantController::class, 'branches']);

    Route::middleware('permission:users.manage')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::post('/users/{user}/reset-password', [UserController::class, 'resetPassword']);
        Route::post('/users/{user}/roles', [UserController::class, 'assignRoles']);
    });

    Route::middleware('permission:roles.manage')->group(function () {
        Route::get('/permissions', [RoleController::class, 'permissions']);
        Route::apiResource('roles', RoleController::class);
    });

    Route::prefix('reports')->middleware('permission:reports.view')->group(function () {
        Route::get('/sales', [ReportController::class, 'sales']);
        Route::get('/inventory', [ReportController::class, 'inventory']);
        Route::get('/financials', [ReportController::class, 'financials']);
        Route::get('/customers', [ReportController::class, 'customers']);
    });

    $resources = require base_path('routes/api/generated_resources.php');
    foreach ($resources as $resource) {
        Route::apiResource($resource['group'].'/'.$resource['resource'], $resource['controller']);
    }
});
