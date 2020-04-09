<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Mail\NewProduct;
use App\Mail\UpdateProduct;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('subscribed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('company_id', Auth::user()->company->id)->simplePaginate(15);
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

        $data = $request->all();
        $data['purchased_date'] = Carbon::parse($data['purchased_date']);
        $data['expiry_date'] = Carbon::parse($data['expiry_date']);

        if ($request->hasfile('picture')) {
            $file = $request->file('picture');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'product-images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            $data['picture'] = $filePath;
        }


        $product = Product::create($data);

        $company = Auth::user()->company;

        Mail::to($company)->send(new NewProduct($company, $product));

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
        $company = Auth::user()->company;

        $data = $request->all();
        $data['purchased_date'] = Carbon::parse($data['purchased_date']);
        $data['expiry_date'] = Carbon::parse($data['expiry_date']);

        if ($request->hasfile('picture')) {
            $file = $request->file('picture');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'product-images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            $data['picture'] = $filePath;
        }


        $product->update($data);

        Mail::to($company)->send(new UpdateProduct($company, $product));

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('warning', 'product deleted');
    }
}
