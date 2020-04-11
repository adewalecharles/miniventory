<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Product;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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



            foreach ($data['cart'] as  $item) {

                $product = Product::findOrFail($item['product']['id']);

                if ($product->qty < $item['quantity']) return response()->json([
                    'message' => $product->name +" should not be more than ".$product->qty
                ], 401);

            }

        $data['company_id'] = Auth::user()->company->id;


        try {
            DB::beginTransaction();

             $data['reference'] =Str::random(10);


            $checkout = Checkout::create($data);

            $totalAmount = 0;

             foreach ($data['cart'] as  $item) {

                $product = Product::findOrFail($item['product']['id']);

                $totalAmount += $item['quantity'] * $product->amount;

                Purchase::create([
                    'checkout_id' => $checkout->id,
                    'product_id' => $product->id,
                    'initial_quantity' => $product->qty,
                    'final_quantity' => $product->qty - $item['quantity'],
                    'amount_at_sale' => $product->amount
                ]);

                $product->update([
                    'qty' => $product->qty - $item['quantity']
                ]);


            }

            $checkout->update([
                'total_amount' => $totalAmount
            ]);

            DB::commit();



        return response()->json([
            'message' => 'Checkout was successful',
            'checkout' => $checkout,
            'status' => true
        ], 200);



        }catch(\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Error ocurred']);
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

    public function checkout($reference)
    {
        $checkout = Checkout::where("reference", $reference)->firstOrFail();

        return view('checkout.invoice', compact('checkout'));

    }
}
