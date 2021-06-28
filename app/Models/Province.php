<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'code',
        'active',
        'created_at',
        'updated_at',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class, 'province_id', 'id');
    }
}
