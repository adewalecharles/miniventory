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
                        <th>STATUS</th>
                        <th>PROGRESS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>35% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-danger">Overdue</span></td>
                        <td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Aliquam</td>
                        <td><span class="label label-info">Out of stock</span></td>
                        <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="clearfix"></div>
</div>
@endsection
