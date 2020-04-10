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
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        $checkouts = Checkout::where('company_id', Auth::user()->company->id)->simplePaginate(5);
        return view('checkout.index', compact('checkouts', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        return view('checkout.index', compact('products'));
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
            'cart' => 'required|array',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ]);


        $data = $request->all();

        $data['company_id'] = Auth::user()->company->id;

        foreach ($data['cart'] as  $item) {

            // if ($quantity <= $product->qty) {
            //     Checkout::create($checkout);

            //     return redirect()->back()->with('success', 'Product checked out successfully');
            // }
            // return redirect()->back()->with('warning', 'Product could not be checked out as the you do not have enough stock');
        }
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

    // public function invoice()
    // {
    //     $checkouts = Checkout::where('company_id', Auth::user()->company->id);
    //     return view('checkout.invoice', compact('checkouts'));

    //     if (isset($_POST['print'])) {
    //         # code...
    //     }
    // }
}
