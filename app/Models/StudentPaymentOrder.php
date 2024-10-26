<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPaymentOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'students_id',
        'amount',
        'remarks',
    ];
}
