<?php

namespace App\Backend\Services;

use App\Backend\Models\AuditLog;

class SessionService
{
    private const SESSION_KEY = 'multi_pos_user';
    private const BUSINESS_KEY = 'multi_pos_business';

    public function start(array $user, ?array $business = null): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[self::SESSION_KEY] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
        ];

        if ($business) {
            $_SESSION[self::BUSINESS_KEY] = [
                'id' => $business['id'],
                'name' => $business['name'],
                'slug' => $business['slug'],
                'subscription_tier' => $business['subscription_tier'],
            ];
        }
    }

    public function user(): ?array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION[self::SESSION_KEY] ?? null;
    }

    public function business(): ?array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION[self::BUSINESS_KEY] ?? null;
    }

    public function isAuthenticated(): bool
    {
        return $this->user() !== null;
    }

    public function destroy(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION[self::SESSION_KEY], $_SESSION[self::BUSINESS_KEY]);
        session_destroy();
    }

    public function setBusiness(array $business): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[self::BUSINESS_KEY] = [
            'id' => $business['id'],
            'name' => $business['name'],
            'slug' => $business['slug'],
            'subscription_tier' => $business['subscription_tier'],
        ];
    }
}
