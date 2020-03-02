<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = Checkout::where('company_id', Auth::user()->company->id)->simplePaginate(5);
        return view('checkout.index', compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        return view('checkout.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => '',
            'qty' => 'required',
        ]);


        $data = $request->all();

        Checkout::create($data);

        return redirect()->back()->with('success', 'Product checked out successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return view('checkout.show', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        return view('checkout.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        $data = $request->all();
        $checkout->update($data);

        return view('checkout.index')->with('success', 'Checked out product editted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        $checkout->delete();
        return view('checkout.index')->with('warning', 'Checked out product deleted succeesfully');
    }
}
