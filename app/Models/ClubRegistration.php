<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubRegistration extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function club()
    {
        return $this->hasMany(ClubRegistration::class, 'club_registrations_id', 'id');
    }
}
