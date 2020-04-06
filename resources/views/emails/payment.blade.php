@component('mail::message')
# Hello from MiniVentory

Hey {{ $company->name }},
We have recieved your payment and you now start using our Inventory app.

We are happy to have you onboard!

@component('mail::button', ['url' => config('app.url') . '/login'])
View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
