<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Agrovet\Models;

use App\Backend\Models\BaseModel;

class AnimalMedicinesModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_agrovet_animal_medicines';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
