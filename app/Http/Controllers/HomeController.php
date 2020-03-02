<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('subscribed');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->admin == 1) {
            return redirect()->route('admin.index')->with('success', 'Welcome admin!');
        } else if (!auth()->user()->admin && !auth()->user()->company()->exists()) {
            return  redirect()->route('company.create')->with('warning', 'OOps!, seems you have not created a compnay yet!, kindly fill the form below');
        } else if (auth()->user()->company()->exists() && auth()->user()->subscribed == 0) {
            return redirect()->route('payment-process')->with('warning', 'seems you have no active subscription, please subscribe to complete Your registration');
        } else if (auth()->user()->company()->exists() && auth()->user()->subscribed == 1) {
            $date = new Carbon();

            $expiredproducts = Product::where('expiry_date', '<=', $date->addMonth(12))
                ->where('company_id', Auth::user()->company->id)->simplePaginate(5);

            $products = Product::where('company_id',  Auth::user()->company->id)->simplePaginate(5);

            return view('home', compact('products', 'expiredproducts'))
                ->with('i', (request()->input('page', 1) - 1) * 5);;;
        }
    }
}
