<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_name',
        'amount',
        'remarks',
        'transaction_type',
    ];

    public function member_transaction()
    {
        return $this->belongsTo(MemberTransaction::class, 'table_id', 'id');
    }
}
