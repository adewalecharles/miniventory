<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\NewUserMail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'tagline' => '',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required|unique:companies',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|unique:companies',
            'user_id' => '',
        ]);

        $data = $request->all();
        if ($request->hasfile('picture')) {
            $file = $request->file('picture');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            $data['picture'] = $filePath;
        }

        Company::create($data);

         Mail::to($user)->send(new NewUserMail($user));

        if (Auth::user()->subscribed == 1) {
            $date = new Carbon();

            $expiredproducts = Product::where('expiry_date', '<=', $date->addMonth(12))
                ->where('company_id', Auth::user()->company->id)->simplePaginate(5);

            $products = Product::where('company_id',  Auth::user()->company->id)->simplePaginate(5);

            return view('home', compact('products', 'expiredproducts'))
                ->with('i', (request()->input('page', 1) - 1) * 5)
                ->with('success', 'You have completed your registration!, we are happy to have you onboard, feel free to contact us at info@miniventory.com if you have any issues');;;;
        }

        return view('payment.pay')->with('warning', 'You have succesfully created your account, kindly pay to start getting inventory of all your goods!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
