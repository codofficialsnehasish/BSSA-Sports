<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        
    ];

    public function committee_members()
    {
        return $this->hasMany(CommitteeMembers::class, 'designation_id');
    }
}
