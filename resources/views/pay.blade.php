<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Inventory App, Stock App, Expired product management system, Product Mnagement system, stock management system" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Subscribe </title>
</head>
<body>
    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        @csrf
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                   Subscribe to start having a detailed Inventory of your goods!
                    ₦ 4,000
                </div>
            </p>
            <input type="hidden" name="email" value="{{Auth::user()->email}}">
            <input type="hidden" name="orderID" value=""">
            <input type="hidden" name="amount" value="400000">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> 


            <p>
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>
</body>
</html>