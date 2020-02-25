@component('mail::message')
# Hello from MiniVentory

Hey {{ $company->name }},
You have Update a  product to your company product on our Inventory app.

# Product Details
Name: {{$product->name}}<br>
Quantity: {{$product->qty}}<br>
Brand: {{$product->brand->name}}<br>
Category: {{$product->category->name}}<br>

We are letting you know just incase you didnt do this, you can login into your account to see details.

We are happy to have you onboard!

@component('mail::button', ['url' => config('app.url') . '/login'])
View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
