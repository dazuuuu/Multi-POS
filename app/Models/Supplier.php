<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = array (
  0 => 'name',
  1 => 'email',
  2 => 'phone',
  3 => 'address',
  4 => 'tax_number',
  5 => 'is_active',
);
}
