@component('mail::message')
# Hello from MiniVentory

Hey {{ $user->company->name }},
You have registered your company on our Inventory app, kindly make a payment of #4000 or $10 to complete your registration.

# Details
Name: {{ $user->company->name}}<br>
Email: {{ $user->company->email}}<br>
Phone: {{ $user->company->phone}}<br>
Address: {{ $user->company->address}}<br>

We are happy to have you onboard!


Thanks,<br>
{{ config('app.name') }}
@endcomponent
