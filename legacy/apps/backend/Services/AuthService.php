<?php

namespace App\Backend\Services;

use App\Backend\Models\User;

class AuthService
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register(string $name, string $email, string $password, string $role = 'business_owner'): array
    {
        if ($this->userModel->findByEmail($email)) {
            throw new \InvalidArgumentException('Email already registered.');
        }

        $userId = $this->userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
        ]);

        return $this->userModel->find($userId);
    }

    public function login(string $email, string $password): ?array
    {
        $user = $this->userModel->findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            return null;
        }

        $this->userModel->update((int) $user['id'], ['last_login_at' => date('Y-m-d H:i:s')]);
        return $user;
    }

    public function validateUser(string $email, string $password): bool
    {
        return $this->login($email, $password) !== null;
    }
}
