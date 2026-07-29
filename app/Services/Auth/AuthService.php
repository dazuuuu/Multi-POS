<?php

namespace App\Services\Auth;

use App\Models\LoginHistory;
use App\Models\User;
use App\Models\UserDevice;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthService extends BaseService
{
    public const MAX_FAILED_ATTEMPTS = 5;
    public const LOCKOUT_MINUTES = 15;

    /**
     * @return array{user: User, token: string, token_type: string, requires_2fa: bool}
     */
    public function login(string $email, string $password, ?int $tenantId = null, ?string $deviceName = null, ?string $deviceId = null): array
    {
        $query = User::query()->where('email', $email);

        if ($tenantId !== null) {
            $query->where('tenant_id', $tenantId);
        }

        $user = $query->first();

        if (! $user) {
            $this->recordLogin(null, $tenantId, false, 'User not found');
            throw ValidationException::withMessages(['email' => ['Invalid credentials.']]);
        }

        if (! $user->is_active) {
            $this->recordLogin($user, $user->tenant_id, false, 'Account deactivated');
            throw ValidationException::withMessages(['email' => ['Account is deactivated.']]);
        }

        if ($user->isLocked()) {
            $this->recordLogin($user, $user->tenant_id, false, 'Account locked');
            throw ValidationException::withMessages(['email' => ['Account is temporarily locked. Try again later.']]);
        }

        if (! Hash::check($password, $user->password)) {
            $user->increment('failed_login_attempts');
            if ($user->failed_login_attempts >= self::MAX_FAILED_ATTEMPTS) {
                $user->update(['locked_until' => now()->addMinutes(self::LOCKOUT_MINUTES)]);
            }
            $this->recordLogin($user, $user->tenant_id, false, 'Invalid password');
            throw ValidationException::withMessages(['email' => ['Invalid credentials.']]);
        }

        $requires2fa = $user->two_factor_confirmed_at !== null;

        if ($requires2fa) {
            $challengeToken = $user->createToken('2fa-challenge', ['2fa'])->plainTextToken;
            $this->recordLogin($user, $user->tenant_id, true, '2FA required');

            return [
                'user' => $user,
                'token' => $challengeToken,
                'token_type' => 'Bearer',
                'requires_2fa' => true,
            ];
        }

        return $this->completeLogin($user, $deviceName, $deviceId);
    }

    /**
     * @return array{user: User, token: string, token_type: string, requires_2fa: bool}
     */
    public function completeLogin(User $user, ?string $deviceName = null, ?string $deviceId = null): array
    {
        $user->update([
            'failed_login_attempts' => 0,
            'locked_until' => null,
            'last_login_at' => now(),
            'last_login_ip' => request()->ip(),
        ]);

        if ($deviceId) {
            UserDevice::query()->updateOrCreate(
                ['user_id' => $user->id, 'device_id' => $deviceId],
                [
                    'device_name' => $deviceName ?? 'Unknown Device',
                    'platform' => request()->header('X-Device-Platform'),
                    'last_active_at' => now(),
                    'is_trusted' => true,
                ]
            );
        }

        $token = $user->createToken($deviceName ?? 'api')->plainTextToken;
        $this->recordLogin($user, $user->tenant_id, true);

        return [
            'user' => $user->fresh(),
            'token' => $token,
            'token_type' => 'Bearer',
            'requires_2fa' => false,
        ];
    }

    public function verifyTwoFactor(User $user, string $code): array
    {
        $secret = $user->two_factor_secret;
        if (! $secret || ! $this->verifyTotp($secret, $code)) {
            // Also accept email OTP stored in cache
            $cached = cache()->get("email_otp:{$user->id}");
            if (! $cached || ! hash_equals((string) $cached, $code)) {
                throw ValidationException::withMessages(['code' => ['Invalid verification code.']]);
            }
            cache()->forget("email_otp:{$user->id}");
        }

        $user->tokens()->where('name', '2fa-challenge')->delete();

        return $this->completeLogin($user, request()->input('device_name'), request()->input('device_id'));
    }

    public function logout(User $user, bool $allDevices = false): void
    {
        if ($allDevices) {
            $user->tokens()->delete();
        } else {
            $user->currentAccessToken()?->delete();
        }
    }

    public function changePassword(User $user, string $current, string $new): void
    {
        if (! Hash::check($current, $user->password)) {
            throw ValidationException::withMessages(['current_password' => ['Current password is incorrect.']]);
        }

        $user->update([
            'password' => $new,
            'password_changed_at' => now(),
            'force_password_change' => false,
        ]);

        $user->tokens()->where('id', '!=', $user->currentAccessToken()?->id)->delete();
    }

    public function sendPasswordResetLink(string $email): string
    {
        return Password::broker()->sendResetLink(['email' => $email]);
    }

    public function resetPassword(array $credentials): string
    {
        return Password::broker()->reset($credentials, function (User $user, string $password) {
            $user->forceFill([
                'password' => $password,
                'password_changed_at' => now(),
                'force_password_change' => false,
                'failed_login_attempts' => 0,
                'locked_until' => null,
            ])->save();

            $user->tokens()->delete();
        });
    }

    public function enableTwoFactor(User $user): array
    {
        $secret = $this->generateTotpSecret();
        $user->update(['two_factor_secret' => $secret]);

        return [
            'secret' => $secret,
            'qr_uri' => 'otpauth://totp/Multi-POS:'.$user->email.'?secret='.$secret.'&issuer=Multi-POS',
        ];
    }

    public function confirmTwoFactor(User $user, string $code): void
    {
        if (! $user->two_factor_secret || ! $this->verifyTotp($user->two_factor_secret, $code)) {
            throw ValidationException::withMessages(['code' => ['Invalid verification code.']]);
        }

        $user->update(['two_factor_confirmed_at' => now()]);
    }

    public function disableTwoFactor(User $user, string $password): void
    {
        if (! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages(['password' => ['Password is incorrect.']]);
        }

        $user->update([
            'two_factor_secret' => null,
            'two_factor_confirmed_at' => null,
        ]);
    }

    public function sendEmailOtp(User $user): void
    {
        $code = (string) random_int(100000, 999999);
        cache()->put("email_otp:{$user->id}", $code, now()->addMinutes(10));
        // Queued notification wired in Phase 14; log for now in non-production
        logger()->info('Email OTP generated', ['user_id' => $user->id, 'code' => app()->environment('production') ? '[redacted]' : $code]);
    }

    private function recordLogin(?User $user, ?int $tenantId, bool $success, ?string $failureReason = null): void
    {
        LoginHistory::query()->create([
            'user_id' => $user?->id,
            'tenant_id' => $tenantId ?? $user?->tenant_id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device_name' => request()->input('device_name'),
            'success' => $success,
            'failure_reason' => $failureReason,
        ]);
    }

    private function generateTotpSecret(int $length = 16): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $secret = '';
        for ($i = 0; $i < $length; $i++) {
            $secret .= $chars[random_int(0, strlen($chars) - 1)];
        }

        return $secret;
    }

    private function verifyTotp(string $secret, string $code, int $window = 1): bool
    {
        $timeSlice = (int) floor(time() / 30);

        for ($i = -$window; $i <= $window; $i++) {
            if (hash_equals($this->getTotpCode($secret, $timeSlice + $i), $code)) {
                return true;
            }
        }

        return false;
    }

    private function getTotpCode(string $secret, int $timeSlice): string
    {
        $secretKey = $this->base32Decode($secret);
        $time = pack('N*', 0, $timeSlice);
        $hash = hash_hmac('sha1', $time, $secretKey, true);
        $offset = ord(substr($hash, -1)) & 0x0F;
        $value = (
            ((ord($hash[$offset]) & 0x7F) << 24) |
            ((ord($hash[$offset + 1]) & 0xFF) << 16) |
            ((ord($hash[$offset + 2]) & 0xFF) << 8) |
            (ord($hash[$offset + 3]) & 0xFF)
        ) % 1000000;

        return str_pad((string) $value, 6, '0', STR_PAD_LEFT);
    }

    private function base32Decode(string $secret): string
    {
        $map = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $secret = strtoupper($secret);
        $buffer = 0;
        $bitsLeft = 0;
        $result = '';

        for ($i = 0, $len = strlen($secret); $i < $len; $i++) {
            $val = strpos($map, $secret[$i]);
            if ($val === false) {
                continue;
            }
            $buffer = ($buffer << 5) | $val;
            $bitsLeft += 5;
            if ($bitsLeft >= 8) {
                $bitsLeft -= 8;
                $result .= chr(($buffer >> $bitsLeft) & 0xFF);
            }
        }

        return $result;
    }
}
