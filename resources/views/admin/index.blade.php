@extends('layouts.admin')

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
                    <h3>Users</h3>
                    <h4> {{$users->count()}}  </h4>
                    
                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Active Users</h3>
                    <h4>{{$subscribeUsers->count()}}</h4>

                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Inactive Users</h3>
                    <h4>{{$unsubscribeUsers->count()}}</h4>
                    
                </div>
                
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Companies</h3>
                    <h4>{{$companies->count()}}</h4>
                    
                </div>
                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!--//four-grids here-->

<div class="col-md-12 agile-info-stat">
<div class="stats-info stats-last widget-shadow">
    Inactive Users
            <table class="table stats-table ">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if($user->subscribed == 0)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$user->name ?? ''}}</td>

                        <td>{{$user->email ?? ''}}</td>
                         <td>{{$user->created_at ?? ''}}</td>
                         
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            
        </div>
</div>

<div class="clearfix"></div>
<div class="clearfix"></div>

<div></div><hr>
<div class="col-md-12 agile-info-stat">
    <div class="stats-info stats-last widget-shadow">
        Active Users
                <table class="table stats-table ">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->subscribed == 1)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$user->username ?? ''}}</td>
                        <td>{{$user->email}}</td>
                            <td>{{$user->created_at ?? ''}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                
            </div>
    </div>
<div class="clearfix"></div>
@endsection
