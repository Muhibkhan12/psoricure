<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'price',
        'category',
        'stock',
        'status',
    ];
}
