@extends('layouts.dashboard')

@section('content')

<div class="grid-form1">
    <h3>Edit Product</h3>
      <div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
               <form class="form-horizontal" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                       <div class="form-group">
                           <label for="name" class="col-sm-2 control-label">name</label>
                           <div class="col-sm-8">
                           <input type="text" class="form-control1" id="name" name="name" value="{{$product->name ?? ''}}" autocomplete required>
                           </div>
                       </div>

                    <input type="hidden" name="company_id" value="{{Auth::user()->company->id}}">

                       <div class="form-group">
                           <label for="qty" class="col-sm-2 control-label">Quantity</label>
                           <div class="col-sm-8">
                           <input type="number" class="form-control1" id="qty" name="qty" value="{{$product->qty ?? ''}}" autocomplete="{{old('qty')}}" required>
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="purchased_date" class="col-sm-2 control-label">Purchased Date</label>
                           <div class="col-sm-8">
                           <input type="text" class="form-control1" id="purchased_date" name="purchased_date" value="{{$product->purchased_date ?? ''}}" autocomplete="{{old('purchased_date')}}" required>
                           </div>
                       </div>

                       <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control1" id="amount" name="amount" value="{{$product->amount ?? ''}}" autocomplete="{{old('amount')}}" required>
                        </div>
                    </div>

                       <div class="form-group">
                        <label for="expiry_date" class="col-sm-2 control-label">Expiry Date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control1" id="expiry_date" name="expiry_date" value="{{$product->expiry_date ?? ''}}" autocomplete="{{old('expiry_date')}}">
                        </div>
                    </div>

                       <div class="form-group">
                           <label for="brand_id" class="col-sm-2 control-label">Brand</label>
                           <div class="col-sm-8">
                               <select name="brand_id" id="brand_id">
                                   <option value="{{$product->brand_id ?? ''}}"> {{$product->brand->name ?? ''}}</option>
                                   @foreach($brands as $brand)
                               <option value="{{$brand->id}}">{{$brand->name}}</option>
                               @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group">
                        <label for="category_id" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-8">
                            <select name="category_id" id="category_id">
                                <option value="{{$product->category_id ?? ''}}"> {{$product->category->name}}</option>
                                @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture" class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" name="picture" id="picture" value="{{$product->picture}}">
                        </div>
                    </div>
                       
                    <div class="mt-4">
                        <button class="btn btn-primary" type="submit"> Edit Product</button>
                    </div>
                    
                   </form>
               </div>
           </div>
           

@endsection