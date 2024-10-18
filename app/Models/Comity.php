<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        
    ];
    public function committee_members()
    {
        return $this->hasMany(CommitteeMembers::class, 'committee_id');
    }
}
