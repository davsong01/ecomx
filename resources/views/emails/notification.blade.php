@component('mail::message')

@if($data['type'] == 'salespageapprovalemail')
Dear {{ $data['name'] }},

Your request for salespage has been approved, you can now download  the salespage demo for this product.

Find below your request details.

Product name: {{ $data['product'] }};
Date requested: {{ $data['created_at'] }};  
Date approved: {{ $data['approved_at'] }};  

@endif

@if($data['type'] == 'salespageemail')
Dear Admin,

New salespage request

Details are:

Subscriber'name: {{ $data['name'] }}; <br>
Subscriber's Email: {{$data['email']}}; <br>
Subscriber's Phone: {{ $data['phone'] }}; <br>
Product name: {{ $data['product'] }}; <br>
Date requested: {{ $data['date_requested'] }}; <br><br>

Please login to your dashboard to approve or delete request

@component('mail::button', ['url' => config('app.url').'/salespage'])
    Login to approve or delete request
@endcomponent

@endif
@if($data['type'] == 1)
Dear Admin,

New Withdraw Notification

Please pay:
Name : {{ $data['name'] }}<br>
Email : {{ $data['email'] }}<br>
Phone : {{ $data['phone'] }}<br>
Amount Requested :  &#8358;{{ $data['amount_requested'] }}<br>


Please login to your dashboard to process payment

@component('mail::button', ['url' => config('app.url')])
    Login to approve payment
@endcomponent
@endif

@if($data['type'] == 2)
Dear {{ $data['name'] }},

Payment Notification

Please find details below:

Amount requested :  &#8358;{{ $data['amount_requested'] }}<br>
Amount paid :  &#8358;{{ $data['amount_paid'] }}<br>
Date paid : {{ $data['paid_at'] }}<br>
Referral balance :  &#8358;{{ $data['balance'] }}<br>
Status : Paid<br>
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
