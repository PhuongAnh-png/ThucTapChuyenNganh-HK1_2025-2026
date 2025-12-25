<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ="products";
    protected $fillable = ['id', 'name', 'gia', 'image', 'category_id'];

    protected $casts = [
        'gia' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
