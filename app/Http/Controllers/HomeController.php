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
        $date = new Carbon();

        $expiredproducts = Product::where('expiry_date', '<=', $date->addMonth(12))
            ->where('company_id', Auth::user()->company->id)->simplePaginate(5);

        $products = Product::where('company_id',  Auth::user()->company->id)->simplePaginate(5);

        return view('home', compact('products', 'expiredproducts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);;;
    }
}
