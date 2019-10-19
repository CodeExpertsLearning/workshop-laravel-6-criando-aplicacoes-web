<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'body', 'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
