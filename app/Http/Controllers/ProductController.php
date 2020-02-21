<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('company_id',  Auth::user()->company->id)->get();
        $categories = Category::where('company_id',  Auth::user()->company->id)->get();
        return view('products.create', compact('brands', 'categories'));
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
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'qty' => '',
            'purchased_date' => 'required',
            'expiry_date' => '',
            'amount' => 'required',
            'category_id' => '',
            'brand_id' => '',
            'company_id' => 'required',
        ]);

        $data = $request->all();
        $data['purchased_date'] = Carbon::parse($data['purchased_date']);
        $data['expiry_date'] = Carbon::parse($data['expiry_date']);

        if ($request->has('picture')) {
            $avataruploaded = request()->file('picture');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/product/');
            $avataruploaded->move($avatarpath, $avatarname);

            $data['picture'] = '/product/' . $avatarname;
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::where('company_id',  Auth::user()->company->id)->get();
        $categories = Category::where('company_id',  Auth::user()->company->id)->get();
        return view('products.edit', compact('brands', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->all();
        $data['purchased_date'] = Carbon::parse($data['purchased_date']);
        $data['expiry_date'] = Carbon::parse($data['expiry_date']);

        if ($request->has('picture')) {
            $avataruploaded = request()->file('picture');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/product/');
            $avataruploaded->move($avatarpath, $avatarname);

            $data['picture'] = '/product/' . $avatarname;
        }

        $product->update($data);


        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
