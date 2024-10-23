<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesTransaction extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expenses_category_id');
    }
}
