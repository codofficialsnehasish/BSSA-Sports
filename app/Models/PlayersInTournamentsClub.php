<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayersInTournamentsClub extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_registrations_id',
        'tournaments_id',
        'player_name',
        'father_name',
        'phone_number',
        'whatsapp_number',
        'date_of_birth',
        'age',
        'aadhar_number',
        'address',
        'district_id',
    ];

    public function club()
    {
        return $this->belongsTo(ClubInTournamet::class, 'club_registrations_id', 'id');
    }
}
