<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'father_name',
        'email',
        'mobile_number',
        'whatsapp_number',
        'aadhar_card_no',
        'dob',
        'age',
        'address',
        'member_cat_id',
        'category_id',
        'district_id',
        'aadhar_proof',
        'profile_image',
        'status',
        'member_id'
    ];

    public function aadhar_proof_media()
    {
        return $this->belongsTo(Media::class, 'aadhar_proof', 'id');
    }
    public function profile_image_media()
    {
        return $this->belongsTo(Media::class, 'profile_image', 'id');
    }
    public function member_category()
    {
        return $this->belongsTo(MemberCategory::class, 'member_cat_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function special_interest()
    {
        return $this->belongsTo(SpecialInterest::class, 'category_id', 'id');
    }
}
