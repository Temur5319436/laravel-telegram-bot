<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'region_id',
        'code',
        'active',
        'created_at',
        'updated_at',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
