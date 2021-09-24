<?php

namespace App\Http\Controllers;
use App\User;
use App\SwitchUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SwitchUserController extends Controller
{
    public function index(Request $request, $id)
    {
     
        
        if(Auth::user()->level <> 2 && Auth::user()->level <> 3 )
        {
            return redirect('/');
        }
        
        $user = User::find($id);

        Auth::user()->setSwitchingUser($user->id);
        
        // Guard against administrator switch
        if( ( Auth::user()->level == 3 || Auth::user()->level == 2 ) && $user->level == 1 )
        {
            return redirect(route('dashboard'))->with('message', 'You have been switched to '.$user->name.'!');
            // return back()->with('message', 'Sorry, you cannot switch to this user');
        }

        if( ( Auth::user()->level == 2 ))
        {
            return redirect(route('dashboard'))->with('message', 'You have been switched to '.$user->name.'!');

        }
         return back()->with('message', 'Sorry, you do not have enough rights to swich to this user');
    }

    public function stopSwitching()
    {
        
        Auth::user()->stopSwitchingUser();
        
        $message = "Welcome back boss!";
        $smiley = '<b>These are bold texts</b>';
        return redirect(route('users.index'))->with('welcomeback', $message);   

    }
    
}