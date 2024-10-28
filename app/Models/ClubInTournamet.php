<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubInTournamet extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->belongsTo(ClubRegistration::class, 'club_registrations_id', 'id');
    }

    public function players()
    {
        return $this->hasMany(PlayersInTournamentsClub::class, 'club_registrations_id', 'id');
    }
}
