<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'category_id',
        'code',
        'price',
        'image_url',
        'commentary',
        'active',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function created_at()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }
}
