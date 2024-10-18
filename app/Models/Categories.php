<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
        'is_home',
        'is_popular',
        'is_special',
        'media_id',
    ];

    public function getCreatedAtAttribute($value){
        return date('jS M, Y',strtotime($value));
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    public function fees_category()
    {
        return $this->hasMany(FeeCategory::class, 'category_id', 'id');
    }
}
