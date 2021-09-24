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

If this is your first time of subscribing to eComX, you are entitled to a whatsapp order group which will be created for you upon request.

@component('mail::button', ['url' => 'https://wa.me/+2347082112637?text=Kindly create eComX order group for me'])
Click here to request for your order group<br><br>
@endcomponent

Login to your customized portal with your email and password to get started.

@component('mail::button', ['url' => config('app.url') .'/dashboard'])
Login to portal here<br><br>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
