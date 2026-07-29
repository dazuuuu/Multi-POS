<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Api\V1\Auth\ChangePasswordRequest;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\ResetPasswordRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\LoginHistory;
use App\Models\UserDevice;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends ApiController
{
    public function __construct(
        private readonly AuthService $authService,
    ) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login(
            $request->validated('email'),
            $request->validated('password'),
            $request->validated('tenant_id'),
            $request->validated('device_name'),
            $request->validated('device_id'),
        );

        return $this->success([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
            'token_type' => $result['token_type'],
            'requires_2fa' => $result['requires_2fa'],
            'force_password_change' => (bool) $result['user']->force_password_change,
        ], $result['requires_2fa'] ? 'Two-factor authentication required.' : 'Logged in successfully.');
    }

    public function verifyTwoFactor(Request $request): JsonResponse
    {
        $request->validate(['code' => ['required', 'string', 'size:6']]);
        $result = $this->authService->verifyTwoFactor($request->user(), $request->input('code'));

        return $this->success([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
            'token_type' => $result['token_type'],
            'requires_2fa' => false,
        ], 'Two-factor verified.');
    }

    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request->user(), (bool) $request->boolean('all_devices'));

        return $this->success(null, 'Logged out successfully.');
    }

    public function me(Request $request): JsonResponse
    {
        return $this->success(new UserResource($request->user()->load('roles')));
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        $request->user()->update($data);

        return $this->success(new UserResource($request->user()->fresh()), 'Profile updated.');
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $this->authService->changePassword(
            $request->user(),
            $request->validated('current_password'),
            $request->validated('password'),
        );

        return $this->success(null, 'Password changed successfully.');
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $request->validate(['email' => ['required', 'email']]);
        $status = $this->authService->sendPasswordResetLink($request->input('email'));

        return $status === Password::RESET_LINK_SENT
            ? $this->success(null, __($status))
            : $this->error(__($status), 422);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $status = $this->authService->resetPassword($request->validated());

        return $status === Password::PASSWORD_RESET
            ? $this->success(null, __($status))
            : $this->error(__($status), 422);
    }

    public function enableTwoFactor(Request $request): JsonResponse
    {
        $data = $this->authService->enableTwoFactor($request->user());

        return $this->success($data, 'Scan the QR URI with your authenticator app, then confirm.');
    }

    public function confirmTwoFactor(Request $request): JsonResponse
    {
        $request->validate(['code' => ['required', 'string', 'size:6']]);
        $this->authService->confirmTwoFactor($request->user(), $request->input('code'));

        return $this->success(null, 'Two-factor authentication enabled.');
    }

    public function disableTwoFactor(Request $request): JsonResponse
    {
        $request->validate(['password' => ['required', 'string']]);
        $this->authService->disableTwoFactor($request->user(), $request->input('password'));

        return $this->success(null, 'Two-factor authentication disabled.');
    }

    public function sendEmailOtp(Request $request): JsonResponse
    {
        $this->authService->sendEmailOtp($request->user());

        return $this->success(null, 'OTP sent to your email.');
    }

    public function devices(Request $request): JsonResponse
    {
        $devices = UserDevice::query()->where('user_id', $request->user()->id)->latest('last_active_at')->get();

        return $this->success($devices);
    }

    public function revokeDevice(Request $request, int $id): JsonResponse
    {
        UserDevice::query()->where('user_id', $request->user()->id)->where('id', $id)->delete();

        return $this->success(null, 'Device revoked.');
    }

    public function loginHistory(Request $request): JsonResponse
    {
        $history = LoginHistory::query()
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(config('api.pagination.per_page', 15));

        return $this->success($history);
    }

    public function tokens(Request $request): JsonResponse
    {
        return $this->success($request->user()->tokens()->get(['id', 'name', 'last_used_at', 'created_at']));
    }

    public function revokeToken(Request $request, int $id): JsonResponse
    {
        $request->user()->tokens()->where('id', $id)->delete();

        return $this->success(null, 'Token revoked.');
    }
}
