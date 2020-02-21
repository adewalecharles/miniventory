@extends('layouts.dashboard')

@section('content')

<div class="grid-form1">
    <h3>Add Product</h3>
      <div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
               <form class="form-horizontal" action="{{route('products.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                       <div class="form-group">
                           <label for="name" class="col-sm-2 control-label">name</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control1" id="name" name="name" autocomplete required>
                           </div>
                       </div>

                    <input type="hidden" name="company_id" value="{{Auth::user()->company->id}}">

                       <div class="form-group">
                           <label for="qty" class="col-sm-2 control-label">Quantity</label>
                           <div class="col-sm-8">
                           <input type="number" class="form-control1" id="qty" name="qty" autocomplete="{{old('qty')}}" required>
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="purchased_date" class="col-sm-2 control-label">Purchased Date</label>
                           <div class="col-sm-8">
                           <input type="text" class="form-control1" id="purchased_date" name="purchased_date" autocomplete="{{old('purchased_date')}}" required>
                           </div>
                       </div>

                       <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-8">
                        <input type="number" class="form-control1" id="amount" name="amount" min="0.01" step="0.01"required>
                        </div>
                    </div>

                       <div class="form-group">
                        <label for="expiry_date" class="col-sm-2 control-label">Expiry Date</label>
                        <div class="col-sm-8">
                        <input type="dateTime" class="form-control1" id="expiry_date" name="expiry_date">
                        </div>
                    </div>

                       <div class="form-group">
                           <label for="brand_id" class="col-sm-2 control-label">Brand</label>
                           <div class="col-sm-8">
                               <select name="brand_id" id="brand_id">
                                   <option value="NULL"> Please Choose a Brand</option>
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
                                <option value="NULL"> Please Choose a Category</option>
                                @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture" class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="picture" id="picture">
                        </div>
                    </div>
                       
                    <div class="mt-4">
                        <button class="btn btn-primary" type="submit"> Add Product</button>
                    </div>
                    
                   </form>
               </div>
           </div>
           

@endsection