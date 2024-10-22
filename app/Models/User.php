<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'profile_image', 'id');
    }

    public function aadhaar_media()
    {
        return $this->belongsTo(Media::class, 'aadhaar_image', 'id');
    }

    public function pan_card_media()
    {
        return $this->belongsTo(Media::class, 'pan_card_proof', 'id');
    }

    public function bank_passbook_media()
    {
        return $this->belongsTo(Media::class, 'passbook_image', 'id');
    }

    public function sallary()
    {
        return $this->hasOne(SalaryConfiguration::class, 'user_id', 'id');
    }
}
