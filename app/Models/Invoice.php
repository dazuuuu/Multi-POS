<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = array (
  0 => 'branch_id',
  1 => 'customer_id',
  2 => 'sale_id',
  3 => 'invoice_number',
  4 => 'invoice_type',
  5 => 'status',
  6 => 'subtotal',
  7 => 'tax_amount',
  8 => 'total_amount',
  9 => 'due_date',
  10 => 'notes',
);
}
