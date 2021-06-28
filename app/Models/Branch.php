<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'province_id',
        'created_at',
        'updated_at',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
