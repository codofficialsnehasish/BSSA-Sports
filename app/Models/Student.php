<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_date',
        'application_id',
        'roll_no',
        'full_name',
        'guardian_name',
        'email',
        'mobile_number',
        'whatsapp_number',
        'dob',
        'age',
        'sex',
        'height',
        'weight',
        'school_portal_id',
        'uniform_size',
        'residential_address',
        'permanent_address',
        'class_id',
        'interest_id',
        'category_id',
        'district_id',
        'subdivision_id',
        'aadhar_card_no',
        'aadhar_proof',
        'profile_image',
        'admission_fees',
        'monthly_fees',
        'fee_category_id',
        'status',
    ];

    public function aadhar_proof_media()
    {
        return $this->belongsTo(Media::class, 'aadhar_proof', 'id');
    }
    public function profile_image_media()
    {
        return $this->belongsTo(Media::class, 'profile_image', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }
    public function subdivision()
    {
        return $this->belongsTo(Subdivisions::class, 'subdivision_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
    public function special_interest()
    {
        return $this->belongsTo(SpecialInterest::class, 'interest_id', 'id');
    }
    public function student_transactions()
    {
        return $this->hasMany(StudentTransaction::class, 'students_id');
    }
}
