<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Newsletter;
use App\Mail\NewProductMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'refferal' => ['nullable', 'string'],
            'phone' => ['required', 'regex:/[0-9]{11}/'],
            'password' => ['required', 'string', 'min:6'],

        ]);
        
    }


    protected function create(array $data)
    {
        //Assign admin referral to this user if he doesn't fill any
       if($data['refferal'] == NULL ){
        $upline = User::whereLevel('2')->first();
   
        $my_upline = $upline->id;
  
        }

        if($data['refferal'] != NULL ){
            $upline = User::whereUsername($data['refferal'])->first();
            
            if(isset($upline)){
                $my_upline = $upline->id;

            }else{
                $upline = User::whereLevel('2')->first();
    
                $my_upline = $upline->id; 
            }
            
        }

        //Subscribe to mailchimp list
        if ( ! Newsletter::isSubscribed($data['email']) ) {
            // Newsletter::subscribe($data['email']);
            Newsletter::subscribe($data['email'], ['FNAME'=>$data['name'], 'PHONE'=>$data['phone']]);
        }
        Newsletter::subscribe($data['email'], ['FNAME'=>$data['name'], 'PHONE'=>$data['phone']]);
        // Newsletter::subscribe($data['email']);
        
        $d['name'] = $data['name'];
        $d['type'] = 'newregistration';

        Mail::to($data['email'])->send(new NewProductMail($d));
        
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'my_upline' => $my_upline,
            'level' => 1
        ]);
    }
}
