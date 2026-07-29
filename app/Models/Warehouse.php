<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = array (
  0 => 'branch_id',
  1 => 'name',
  2 => 'code',
  3 => 'address',
  4 => 'is_active',
);
}
