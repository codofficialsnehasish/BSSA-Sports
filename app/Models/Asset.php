<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(AssetsCategory::class, 'assets_category_id');
    }
}
