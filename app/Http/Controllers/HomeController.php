<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = Brand::where('company_id',  Auth::user()->company->id)->get();
        $products = Product::where('company_id',  Auth::user()->company->id)->get();
        $categories = Category::where('company_id',  Auth::user()->company->id)->get();
        return view('home', compact('brands', 'products', 'categories'));
    }
}
