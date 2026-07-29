<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = [
        'tenant_id', 'patient_number', 'first_name', 'last_name', 'date_of_birth',
        'gender', 'phone', 'email', 'national_id', 'address', 'insurance_provider',
        'insurance_number', 'blood_group', 'allergies', 'medical_history',
        'emergency_contact', 'metadata',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'metadata' => 'array',
        ];
    }
}
