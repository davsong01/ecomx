@component('mail::message')

Dear {{ $user->name }},
Your payment of &#8358;{{ $transaction['amount'] }} has been received, please find a summary of your transaction below:

<strong>Type: </strong> {{ ($transaction['type'] == 1) ? 'New Plan' : 'Plan Upgrade' }}
<strong>Plan: </strong> {{ $plan['title'] }} 
<strong>Name: </strong> {{ $user['name'] }} 
<strong>Email: </strong> {{ $user['email'] }} 
<strong>Phone: </strong> {{ $user['phone'] }} 
<strong>Amount Paid: </strong> &#8358;{{ $transaction['amount'] }} 
<strong>Status: </strong> {{ $transaction['status'] }} 
<strong>Payment Date: </strong> {{ $transaction['created_at'] }} 
<strong>Expiry Date: </strong> {{ $user['plan_expiry'] }} 
<strong>Reference: </strong> {{  $transaction['reference']  }} 

Login to your customized portal with your email and password to manage your account.

@component('mail::button', ['url' => config('app.url') .'/dashboard'])
Login to portal here<br><br>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
