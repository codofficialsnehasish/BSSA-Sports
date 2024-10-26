<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTransaction extends Model
{
    use HasFactory;

    public function member_transaction()
    {
        return $this->hasMany(Transaction::class, 'table_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Members::class, 'member_id', 'id');
    }


}
