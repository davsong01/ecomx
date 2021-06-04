<?php

namespace App;

use App\Plan;
use App\Category;
use App\Salespage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function salespage(){
        return $this->hasone(Salespage::class);
    }

    public function scopeCategoryfilter($slug){
      
        return $this->belongsToMany(Category::class)->where('slug', $query);
    }
   
}
