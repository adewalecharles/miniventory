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