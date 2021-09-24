<?php



namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Paystack;
use Exception;
use App\Settings;
use Carbon\Carbon;
use App\Transaction;
use App\Mail\AdminMail;
use App\Mail\newPlanMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Mail\UserNewPlanMail;
use App\Mail\AdminNewPlanMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller

{

	public function redirectToGateway(Request $request)
	{
		
		$data = $this->validate($request, [
			'orderID' => 'required|numeric',
  			'email' => 'required',
  			'amount' => 'required|numeric',
  			'quantity' => 'required|numeric'
		]);
			
		//Validate Plan and Price
		return Paystack::getAuthorizationUrl()->redirectNow();
		try {
			return Paystack::getAuthorizationUrl()->redirectNow();
		} catch (\Exception $e) {
			return Redirect::back()->with('error', $e);
		}
	}

	public function handleGatewayCallback()
	{
		$paymentDetails = Paystack::getPaymentData();
		
		if ($paymentDetails['data']['status'] === 'success') {
			//get plan id
			$plan =  Plan::whereId($paymentDetails['data']['metadata']['plan_id'])->first();
			$user = User::with('plan')->whereEmail($paymentDetails['data']['customer']['email'])->first();
			
			$check_amount = $paymentDetails['data']['amount'] / 100;

			if($check_amount != $plan->mprice &&  $check_amount!= $plan->threemprice && $check_amount != $plan->sixmprice && $check_amount != $plan->twelvemprice){
				$status = 'Part';
			}else{
				$status = 'Complete';
			}
			
			//Update Transactions table
			$transaction = Transaction::create([
				'user_id' =>  $user->id,
            	'plan_id' => $plan->id,
            	'amount' => $paymentDetails['data']['amount'] / 100,
				'plan_start' => Carbon::now(),
				'plan_expiry' => Carbon::now()->addMonths($paymentDetails['data']['metadata']['validity']),
				'validity' => $paymentDetails['data']['metadata']['validity'],
            	'reference' => $paymentDetails['data']['reference'],
            	'status' => $status,
				'type' => $paymentDetails['data']['metadata']['type'],
			]);

			//Check Type, if 1, create new plan for this user.
			if($status = 'Complete'){
				if($paymentDetails['data']['metadata']['type'] == 1){
			
					$user->plan_id = $plan->id;
					$user->plan_expiry = Carbon::now()->addMonths($paymentDetails['data']['metadata']['validity']);
					$user->plan_start = Carbon::now();
					
					$user->validity = $paymentDetails['data']['metadata']['validity'];
					$user->save();
					
					//Update referral bonus
					if($user->my_upline != NULL){
						$referral_bonus = (Settings::select('referral_percent')->first()->value('referral_percent')/100) * $transaction->amount;
	
						$referral = User::whereId($user->my_upline)->first();
						$referral->referral_bonus +=  $referral_bonus;
						$referral->save();
					}
					 
				}
	
				//Check Type, if 2, upgrade plan for this user.
				if($paymentDetails['data']['metadata']['type'] == 2){
					//get how much per day for old plan
					$plan_days = Carbon::parse($user->plan_start)->diffInDays($user->plan_expiry);

					//how many days is oldplan
					$oldplanpriceperday = $this->getOldPlanPricePerday($user, $plan_days);
					
					//remaining days
					$remaining_days = Carbon::now()->diffInDays($user->plan_expiry);

					//Convert to cash
					$cashBalance = $oldplanpriceperday * $remaining_days;

					$new_plan_days = Carbon::now()->addMonths($paymentDetails['data']['metadata']['validity']);
					
					$new_plan_days = Carbon::now()->diffInDays($new_plan_days);
				
					//get new plan details
					$newplanpriceperday = $this->getNewPlanPricePerday($plan, $new_plan_days, $paymentDetails['data']['metadata']['validity'] );

					//How much can cashbalance buy from the new plan
					$balance_in_days = round($cashBalance / $newplanpriceperday);
					
					//new expiry date
					$user->plan_expiry = Carbon::now()->addDays($balance_in_days + $new_plan_days);
					$user->plan_start = Carbon::now();
					$user->plan_id = $plan->id;
					
					$user->validity = $plan_days/$balance_in_days;

					$user->save();
				
					//Update Transaction
					$transaction->update([
						'plan_expiry' => $user->plan_expiry,
						'validity' => NULL,
					]);
					
					if($user->my_upline != NULL){
						$referral_bonus = (Settings::select('referral_percent')->first()->value('referral_percent')/100) * $transaction->amount;
	
						$referral = User::whereId($user->my_upline)->first();
						$referral->referral_bonus +=  $referral_bonus;
						$referral->save();
					}
					
				}                                     
				
				//send email to participant
				Mail::to($user->email)->send(new UserNewPlanMail($user, $plan, $transaction));
	
				//send email to official email
				Mail::to(Settings::select('official_mail')->first()->value('official_mail'))->send(new AdminNewPlanMail($user, $plan, $transaction));

				return(redirect(route('plan.info')))->with('message', 'Payment successfull!');
				
			}else{
				return(redirect(route('plan.info')))->with('error', 'Payment successfull but plan not updated, please contact support!');
				// return view('users.planprofile')->with('message', 'Payment successfull!');
			}
			
		}else {
			dd('Transaction failed! We have not received any money from you.');
		}

	}

	private function getOldPlanPricePerday($user, $plan_days){

		if($user->validity >= 1 && $user->validity < 3){
			$oldPlanDailyPayment = round($user->plan->mprice / $plan_days);
		}

		if($user->validity >= 3 && $user->validity < 6){
			$oldPlanDailyPayment = round($user->plan->threemprice / $plan_days);
		}

		if($user->validity >= 6 && $user->validity < 12){
			$oldPlanDailyPayment = round($user->plan->sixmprice / $plan_days);
		}
		if($user->validity >= 12){
			$oldPlanDailyPayment = round($user->plan->sixmprice / $plan_days);
		}

		return $oldPlanDailyPayment;	
	}
	
	private function getNewPlanPricePerday($plan, $plan_days, $validity){

		if($validity == 1){
			$newPlanDailyPayment = round($plan->mprice / $plan_days);
		}

		if($validity == 3){
			$newPlanDailyPayment = round($plan->threemprice / $plan_days);
		}

		if($validity == 6){
			$newPlanDailyPayment = round($plan->sixmprice / $plan_days);
		}
		if($validity == 12){
			$newPlanDailyPayment = round($plan->sixmprice / $plan_days);
		}

		return $newPlanDailyPayment;	
	}
}

