<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = array (
  0 => 'branch_id',
  1 => 'expense_category_id',
  2 => 'description',
  3 => 'amount',
  4 => 'expense_date',
  5 => 'payment_method',
  6 => 'reference',
);
}
