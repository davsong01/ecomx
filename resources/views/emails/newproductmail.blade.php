@component('mail::message')
@if($d['type'] == 'newproduct')
Dear {{ $d['name'] }},

A new unique product has been added on your eComX product list page.

Another opportunity to make more sales and more money.

Click <a href="{{ config('app.url') }}/dashboard"><b>HERE</b></a> to access the product, the sales page and facebook ad creative.

All the best!

Thanks,<br>
{{ config('app.name') }}

@endif
@if($d['type'] == 'newregistration')
Hi {{ $d['name'] }} ,

Welcome to the eComX Trybe! 

You’re one-step to getting started. 

<b>Subscribe to a plan</b> to kick-off your earnings with eCom Business. 

Everything has been done for you, from access to unique hot selling products to sales copy of the product, advert creatives for your ad and even upsells. 

<a href="{{ config('app.url') }}/selectplans"><b>Get started now</b></a>


eComX
@endif

@endcomponent
