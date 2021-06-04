<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;


class UserController extends Controller
{

    public function index()
    { 
       
        $subscribers = User::with('plan')->whereLevel(1)->get();
       
        return view('admin.users.index', compact('subscribers'));
        
    }

   
    public function create()
    {
        $plans = Plan::whereStatus(1)->get();
        $users = User::whereLevel(1)->get();

        return view('admin.users.create', compact('plans', 'users'));  
    }

    public function store(Request $request)
    {

            $data = $this->validate($request, [
                'name' => 'required|min:3',
                'email' => 'required|unique:users,email',
                'phone' => 'nullable|regex:/[0-9]{11}/',
                'password' => 'nullable|min:4',
                'bank_name' => 'nullable',
                'account_name' => 'nullable',
                'account_number' => 'nullable',
                'referral_bonus' => 'nullable',
                'upline' => 'nullable',
                'plan_id' => 'nullable',
                'plan_start' => 'nullable',
                'plan_expiry' => 'nullable',
                'validity' => 'required|numeric',
            ]);

            //Handle Password
            if($request['password']){
                $data['password'] = Hash::make($request['password']);
            }else $data['password'] = Hash::make(123454321);

            try{  
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => $data['password'],
                    'bank_name' => $data['bank_name'],
                    'account_name' => $data['account_name'],
                    'account_number' => $data['account_number'],
                    'referral_bonus' => $data['referral_bonus'],
                    'my_upline' => $data['upline'],
                    'plan_id' => $data['plan_id'],
                    'plan_start' => Carbon::parse($data['plan_start']),
                    'plan_expiry' => Carbon::parse($data['plan_expiry']),
                    'validity' => $data['validity'],
                    'username' => str_slug($request->name),
                    'level' => 1,

                ]);
               
            }catch (\Illuminate\Database\QueryException $ex) {
                $error = $ex->getMessage();        
                return back()->with('error', $error);
            }
        
            return back()->with('message', 'User successfully created');

    }

    public function edit(User $user)
    {
        $plans = Plan::whereStatus(1)->get();
        $users = User::whereLevel(1)->get();

        return view('admin.users.edit', compact('user', 'users', 'plans'));
    }

    public function update(Request $request, User $user)
    {
        //handle password
        if($request['password']){
            $request['password'] = Hash::make($request['password']);
        }else $request['password'] = $user->password;

            $user->update($request->all());

        return back()->with('message', 'Update successful!');

    }
    
    public function destroy($id)
    {
        $user= User::findOrFail($id);

        $user->delete();

        return back()->with('message', 'Record has been deleted forever!');
    }
    
}
