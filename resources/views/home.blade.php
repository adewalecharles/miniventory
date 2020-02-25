@extends('layouts.dashboard')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i></li>
</ol>
<!--four-grids here-->
<div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Brand</h3>
                    <h4> {{Auth::user()->company->brands->count()}}  </h4>
                    
                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Category</h3>
                    <h4>{{Auth::user()->company->categories->count()}}</h4>

                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Product</h3>
                    <h4>{{Auth::user()->company->products->count()}}</h4>
                    
                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Stock</h3>
                    <h4>14,430</h4>
                    
                </div>
                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!--//four-grids here-->

<div class="col-md-12 agile-info-stat">
<div class="stats-info stats-last widget-shadow">
            <table class="table stats-table ">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>PRODUCT</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$product->name}}</td>

                        <td>{{$product->qty}}</td>
                        
                        @if ($product->qty > 5)
                        <td><span class="label label-success">In Stock</span></td>

                        @elseif ($product->qty < 5)
                        <td><span class="label label-warning">Low</span></td>
                       
                        @elseif ($product->qty <= 1)
                        <td><span class="label label-danger">Out of Stock</span></td> 
                        @endif

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
            
        </div>
</div>

<div class="clearfix"></div>


<div class="alert alert-danger mt-4" role="alert">
    These are products that will expire in less than a year!
  </div>
<div class="col-md-12 agile-info-stat">
    <div class="stats-info stats-last widget-shadow">
                <table class="table stats-table ">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>PRODUCT</th>
                            <th>STATUS</th>
                            <th>Quantity</th>
                            <th>EXPIRATION DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expiredproducts as $expiredproduct)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$expiredproduct->name}}</td>
                            
                            @if ($expiredproduct->qty > 5)
                            <td><span class="label label-success">In Stock</span></td>
    
                            @elseif ($expiredproduct->qty < 5)
                            <td><span class="label label-warning">Low</span></td>
                           
                            @elseif ($expiredproduct->qty <= 1)
                            <td><span class="label label-danger">Out of Stock</span></td> 
                            @endif
    
                            <td>{{$expiredproduct->qty}}</td>

                            <td>{{$expiredproduct->expiry_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $expiredproducts->links() }}
                </div>
                
            </div>
    </div>
<div class="clearfix"></div>

@endsection
