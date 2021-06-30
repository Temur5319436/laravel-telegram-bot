<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'region_id', 'id');
    }
}