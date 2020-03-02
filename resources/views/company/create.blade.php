@extends('layouts.signin')

@section('content')
<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Create Company</h2>
        <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
            @csrf
			<div class="username">
				<span class="username">Name:</span>
				<input type="text" name="name" id="name" class="name  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Tagline:</span>
				<input type="text" name="tagline" class="name @error('tagline') is-invalid @enderror" value="{{ old('tagline') }}" required autocomplete="tagline">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Email:</span>
				<input type="email" name="email" class="name @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Address:</span>
				<input type="text" name="address" class="name @error('address') is-invalid @enderror"required autocomplete="address">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">City:</span>
				<input type="text" name="city" id="city" class="name" required autocomplete="city">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Country:</span>
				<input type="text" name="country" id="country" class="name" required autocomplete="country">
				<div class="clearfix"></div>
			</div>
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="username">
				<span class="username">Phone:</span>
				<input type="tel" name="phone" id="phone" class="name" required autocomplete="phone">
				<div class="clearfix"></div>
			</div>

			<div class="username">
				<span class="username">Company Logo:</span>
				<input type="file" name="picture" id="picture" class="name" required autocomplete="picture">
				<div class="clearfix"></div>
			</div>

			<div class="login-w3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Create Company') }}
                </button>
			</div>
			<div class="clearfix"></div>
		</form>

@endsection