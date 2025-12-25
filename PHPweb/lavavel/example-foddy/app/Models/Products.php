<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ="products";
    // include 'status' so we can mass-assign it from admin forms
    protected $fillable = ['id', 'name', 'gia', 'image', 'category_id', 'status'];

    protected $casts = [
        'gia' => 'float',
        'status' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
