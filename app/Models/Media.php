<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_type',
        'file_name',
        'file_path',
        'video_source',
        'youtube_url',
        'status'
    ];

    public function category()
    {
        return $this->hasMany(Categories::class, 'media_id', 'id');
    }

    public function aadhar_proof_media()
    {
        return $this->hasMany(Members::class, 'aadhar_proof', 'id');
    }
    public function profile_image_media()
    {
        return $this->hasMany(Members::class, 'profile_image', 'id');
    }
}
