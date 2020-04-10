@extends('layouts.dashboard')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i>Products</li>
</ol>
<div class="col-md-12 agile-info-stat">
    <div class="stats-info stats-last widget-shadow">
                <table class="table stats-table ">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>PICTURE</th>
                            <th>NAME</th>
                            <th>PURCHASED DATE</th>
                            <th>EXPIRY DATE</th>
                            <th>AMOUNT</th>
                            <th>CATEGORY</th>
                            <th>BRAND</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td><img src="https://e-ventory.s3.amazonaws.com/{{$product->picture}}" alt="product image" width="50px" height="50px"></td>
                        <td>{{$product->name ?? ''}}</td>
                            <td>{{$product->purchased_date ?? ''}}</td>
                        <td>{{$product->expiry_date ?? ''}}</td>
                        <td>₦{{$product->amount ?? ''}}</td>
                        <td>{{$product->category->name ?? ''}}</td>
                        <td>{{$product->brand->name ?? ''}}</td>  
                        
                        <td>
                        <a href="{{route('products.edit', $product->id)}}"><button class="btn btn-secondary" type="submit">Edit</button></a>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </td>   
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>

            <div class="mt-4">
            <a href="{{route('products.create')}}"><button class="btn btn-primary" type="submit">Add</button></a>
            </div>
    </div>
    <div class="clearfix"></div>
    </div>
@endsection