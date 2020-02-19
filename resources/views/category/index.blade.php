@extends('layouts.dashboard')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i>Categories</li>
</ol>
<div class="col-md-12 agile-info-stat">
    <div class="stats-info stats-last widget-shadow">
                <table class="table stats-table ">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                            <a href="{{route('category.edit', $category->id)}}"><button class="btn btn-primary">Edit</button></a>
                            
                        <form action="{{route('category.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                        </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <a href="{{route('category.create')}}"><button class="btn btn-secondary mt-4">Add</button></a>
    <div class="clearfix"></div>
    </div>

@endsection