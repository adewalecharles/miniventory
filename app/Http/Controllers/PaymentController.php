<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\payment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

    public function index()
    {
        return view('payment.pay');
    }

    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user = Auth::user()->id;
        $usermail =  Auth::user();
        DB::update('update users set subscribed = 1 where id = ' . $user . '');

        Mail::to($usermail)->send(new payment($usermail, $paymentDetails));

        return redirect()->route('home')->with('success', 'You have completed your registration!, we are happy to have you onboard, feel free to contact us at info@miniventory.com if you have any issues');

        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
