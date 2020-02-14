@extends('layouts.signin')

@section('content')
<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" id="email" class="name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password @error('password') is-invalid @enderror" required autocomplete="current-password">
				<div class="clearfix"></div>
			</div>
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember" {{ old('remember') ? 'checked' : '' }}>Remember me<br>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif<br>
			</div>
			<div class="login-w3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Dont have an account?') }}</a>
                    </li>
                @endif
				</div>
				<div class="footer">
                    <p>© 2020 MiniVentory. All Rights Reserved | Design and Developed By   <a href="https://mbh.ng" target="_blank">MybudgetHosting</a> </p>
				</div>
	</div>
	</div>
    </div>
@endsection
