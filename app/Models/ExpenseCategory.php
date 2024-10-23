<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(ExpenseCategory::class, 'expenses_category_id');
    }

    public function expenses()
    {
        return $this->hasMany(ExpensesTransaction::class, 'expenses_category_id', 'id');
    }
}
