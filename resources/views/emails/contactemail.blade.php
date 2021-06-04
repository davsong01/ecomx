@component('mail::message')

Dear Admin,

New  contact message from {{ $data['name'] }},

Details below

<strong>Name: </strong> {{$data['name'] }} <br>
<strong>Email: </strong> {{ $data['email'] }} <br>
<strong>Message: </strong> {{ $data['message'] }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
