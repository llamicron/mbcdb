@extends('layouts.app')

@section('head')
	<title>Login</title>
@endsection

@section('header-title')
	Login
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
				{{-- MDL Login Card --}}
				<div class="login-card mdl-card mdl-shadow--4dp">
					<div class="mdl-card__title mdl-card--expand">
						<h2 class="mdl-card__title-text">Login</h2>
					</div>
					<div class="mdl-card__supporting-text">
						{{-- Content --}}
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
								{!! csrf_field() !!}

								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" name="email" type="text" id="email">
											<label class="mdl-textfield__label" for="email">Email</label>
										</div>
										@if ($errors->has('email'))
												<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
												</span>
										@endif
								</div>

								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" name="password" type="password" id="password">
											<label class="mdl-textfield__label" for="password">Password</label>
										</div>
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
								</div>

								<div class="form-group">
										<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="remember">
											<input type="checkbox" id="remember" name="remember" class="mdl-switch__input">
											<span class="mdl-switch__label">Remember Me</span>
										</label>
								</div>
							</div>
							<div class="mdl-card__actions mdl-card--border">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
									Login
								</button>
								<button type="button" onClick="location='{{ url('/password/reset') }}'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
									Forgot your Password?
								</button>
							</div>
						</div>
					</form>
        </div>
    </div>
</div>
@endsection
