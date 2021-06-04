@component('mail::message')

Dear Admin,
Somebody has just made payment, details below:

<strong>Type: </strong> {{ ($transaction['type'] == 1) ? 'New Plan' : 'Plan Upgrade' }} <br>
<strong>Plan: </strong> {{ $plan['title'] }} <br>
<strong>Name: </strong> {{ $user['name'] }} <br>
<strong>Email: </strong> {{ $user['email'] }} <br>
<strong>Phone: </strong> {{ $user['phone'] }} <br>
<strong>Amount Paid: </strong> &#8358;{{ $transaction['amount'] }} <br>
<strong>Status: </strong> {{ $transaction['status'] }} <br>
<strong>Payment Date: </strong> {{ $transaction['created_at'] }} <br>
<strong>Expiry Date: </strong> {{ $user['plan_expiry'] }} <br>

You can also login to the portal to view and manage users

@component('mail::button', ['url' => config('app.url') .'/dashboard'])
Login to portal here<br><br>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
