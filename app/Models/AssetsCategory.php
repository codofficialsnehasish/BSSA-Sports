<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(AssetsCategory::class, 'assets_category_id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'assets_category_id', 'id');
    }
}
