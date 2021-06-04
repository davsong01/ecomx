<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
