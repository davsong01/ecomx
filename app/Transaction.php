<?php

namespace App;

use App\Plan;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded  = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
