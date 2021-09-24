<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Payout;
use App\Setting;
use App\Settings;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;

class PayoutController extends Controller
{
    public function __construct(){
        $this->middleware('isAdmin')->except(['showWithdrawal', 'createWithdrawal', 'store', 'destroy' ]);
    }

    public function index()
    {
        $payouts = Payout::all();

        return view('admin.payouts.index', compact( 'payouts'));
    }

    public function create()
    {
       
        $users = User::all();
        return view('admin.payouts.create', compact('users'));

    }

    public function showWithdrawal()
    {
        $withdraws = Payout::whereUserId(auth()->user()->id)->get();
      
        return view('users.withdraw', compact('withdraws'));
    }

    public function createWithdrawal()
    {    
        
        if(auth()->user()->referral_bonus < Settings::first()->value('referral_threshold')){
            return abort(404);
        }

        return view('users.createwithdraw');
    }

    
    // Mail::to(Settings::select('official_mail')->first()->value('official_mail'))->send(new ContactEmail($data));

    public function store(Request $request)
    {        
        $data = $this->validate($request, [
            'amount' => 'required|numeric',
        ]);

        //Validate user payment
        if(auth()->user()->referral_bonus < Settings::first()->value('referral_threshold')){
            return back()->with('error', 'Invalid amount sent - You need Jesus');
        }

        //Create Payout
        $payout = Payout::create([
            'user_id' => auth()->user()->id,
            'amount_requested' => $data['amount'],
            'status' => 0
        ]);
                
        //Update user
        auth()->user()->referral_bonus -= $data['amount'];
        auth()->user()->save();

        $data['name'] = auth()->user()->name;
        $data['type'] = 1;
        $data['phone'] = auth()->user()->phone;
        $data['email'] = auth()->user()->email;
        $data['amount_requested'] = $payout->amount_requested;

        //Send notification
        Mail::to(Settings::select('official_mail')->first()->value('official_mail'))->send(new NotificationEmail($data));
        return redirect(route('withdrawals'))->with('message', 'Your request for payment has been sent and the status is PENDING');
    }

    public function edit(Payout $payout)
    {
        return view('admin.payouts.edit', compact('payout'));
    }

    public function update(Request $request, Payout $payout)
    {
        // dd($request->all());
        if($request->status == 1){

            $data = [
                'type' => 2,
                'name' => $payout->user->name,
                'amount_paid' => $request->amount_paid,
                'amount_requested' => $payout->amount_requested,
                'balance' => $payout->user->referral_bonus,
                'paid_at' => $request->paid_at ?: date('Y-m-d'),
                'status' => 1,
                'type' => 2, 
            ];

            //update payment
            $payout->update([
                'status' => 1,
                'paid_at' => $data['paid_at'],
                'amount_paid' => $data['amount_paid'],
            ]);

            Mail::to($payout->user->email)->send(new NotificationEmail($data));
        }
        
        //Send mail
        return back()->with('message', 'Update Successful');
    }

    public function destroy($id)
    {
        $payout = Payout::find($id);

        if(auth()->user()->level == 2){
            $payout->delete();
            return redirect(route('payouts.index'))->with('message', 'Delete successful');
        }

        if(auth()->user()->level == 1 && $payout->user_id == auth()->user()->id){
            if($payout->status == 1){
                return redirect(route('withdrawals'))->with('message', 'You cannot delete this withdrawal for request, it has been approved already');
            }

            $payout->delete();
            return redirect(route('withdrawals'))->with('message', 'Delete successful');
        }

        
        
    }
}
