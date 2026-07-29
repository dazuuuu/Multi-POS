<?php

namespace App\Backend\Services;

class AuthService
{
    public function validateUser(string $email, string $password): bool
    {
        return !empty($email) && !empty($password);
    }
}
