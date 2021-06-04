<?php

namespace App;


use App\Plan;
use App\Post;
use App\Payout;
use App\Salespage;
use App\Transaction;
use App\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];

			/**
	 * The attributes that should be hidden for arrays
	 * @var array
	 */
    protected $hidden = [
        'password', 'remember_token', 'id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function upline(){
        return $this->belongsTo(self::class, 'my_upline');
    }

    public function payouts(){
        return $this->hasMany(Payout::class);
    }

    public function salespage(){
        return $this->hasOne(Salespage::class);
    }

    public function transactions(){
    return $this->hasMany(Transaction::class);
    }

    public function setSwitchingUser($id)
    {
        Session::put('switchuser', $id);
    }

    public function stopSwitchingUser()
    {
        Session::forget('switchuser');
    }

    public function isSwitchingUser()
    {
        return Session::has('switchuser');
    } 
    
      /**
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */

}
