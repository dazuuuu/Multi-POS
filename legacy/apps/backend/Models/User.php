<?php

namespace App\Backend\Models;

class User extends BaseModel
{
    protected string $table = 'users';
    protected array $fillable = [
        'name', 'email', 'password', 'role', 'is_super_admin',
        'two_factor_enabled', 'pin_code', 'last_login_at',
    ];

    public function findByEmail(string $email): ?array
    {
        return $this->findBy('email', $email);
    }
}
