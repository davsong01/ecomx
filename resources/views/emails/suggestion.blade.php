@component('mail::message')
@if($data['type'] = 1)
Dear Admin,

New product suggestion from {{ auth()->user()->name }},

Details below

<strong>Product Name: </strong> {{$data['name'] }}


Attached to this email is the suggested product image
You can also login to the portal to view suggested products

@component('mail::button', ['url' => config('app.url') .'/suggestion'])
Login here<br><br>
@endcomponent

@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent
