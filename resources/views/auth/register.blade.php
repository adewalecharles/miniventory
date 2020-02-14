@extends('layouts.signin')

@section('content')
<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign Up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" id="username" class="name  @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus>
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password @error('password') is-invalid @enderror"required autocomplete="new-password">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Confirm Password:</span>
				<input type="password" name="password_confirmation" id="password-confirm" class="password" required autocomplete="new-password">
				<div class="clearfix"></div>
			</div>
			<div class="login-w3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
			</div>
			<div class="clearfix"></div>
		</form>
		<div class="back">
						<a href="{{route('login')}}">Already have an account?</a>
				</div>
				<div class="footer">
                    <p>© 2020 MiniVentory. All Rights Reserved | Design and Developed By   <a href="https://mbh.ng" target="_blank">MybudgetHosting</a> </p>
				</div>
	</div>
	</div>
    </div>
@endsection
