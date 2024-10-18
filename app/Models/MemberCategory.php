<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fees_amount',
        'type',
        'status',
    ];

    public function member()
    {
        return $this->hasMany(Members::class, 'member_cat_id', 'id');
    }
    
}
