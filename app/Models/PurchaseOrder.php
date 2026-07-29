<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = array (
  0 => 'branch_id',
  1 => 'supplier_id',
  2 => 'order_number',
  3 => 'status',
  4 => 'subtotal',
  5 => 'tax_amount',
  6 => 'total_amount',
  7 => 'expected_date',
  8 => 'notes',
);
}
