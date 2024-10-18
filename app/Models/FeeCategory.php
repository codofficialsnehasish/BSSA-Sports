<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_age',
        'max_age',
        'admission_fees',
        'monthly_fees',
        'category_id',
        'status',
        
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'fee_category_id', 'id');
    }
}
