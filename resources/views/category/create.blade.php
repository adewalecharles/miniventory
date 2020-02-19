@extends('layouts.dashboard')

@section('content')
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i><a href="{{route('category.index')}}">Categories</a><i class="fa fa-angle-right"></i>Create </li>
</ol>

<div class="col-md-12 agile-info-stat">
<form action="{{route('category.store')}}" method="POST">
@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="" autocomplete="" required>
  </div>
  <input type="hidden" name="company_id" value="{{Auth::user()->company->id}}">
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="clearfix"></div>
    </div>
@endsection