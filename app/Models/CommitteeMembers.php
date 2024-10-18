<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'committee_id',
        'member_id',
        'designation_id',
    ];


    public function member()
    {
        return $this->belongsTo(Members::class, 'member_id');
    }

    public function committee()
    {
        return $this->belongsTo(Comity::class, 'committee_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}


