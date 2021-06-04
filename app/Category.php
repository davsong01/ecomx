<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
