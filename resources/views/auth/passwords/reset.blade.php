@extends('layouts.login')

@section('head')
	<title>Reset Password</title>
@endsection

@section('header-title')
	Reset Password
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

					<div class="login-card mdl-card mdl-shadow--4dp">
						<div class="mdl-card__title mdl-card--expand">
							<h2 class="mdl-card__title-text">Reset Password</h2>
						</div>
						<div class="mdl-card__supporting-text">
							{{-- Content --}}
    					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                  {!! csrf_field() !!}
                  <input type="hidden" name="token" value="{{ $token }}">

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
                			<input class="mdl-textfield__input" type="password" name="password" type="text" id="password">
                			<label class="mdl-textfield__label" for="password">New Password</label>
                		</div>
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
                  </div>

                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      	<input type="password" class="mdl-textfield__input" name="password_confirmation" type="text" id="confirm">
                      	<label class="mdl-textfield__label" for="confirm">Confirm Password</label>
                      </div>
											@if ($errors->has('password_confirmation'))
												<span class="help-block">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
											@endif
                  </div>

						</div>
						<div class="mdl-card__actions mdl-card--border">
							{{-- Buttons --}}
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
								Reset Password
							</button>
						</div>
					</form>
					</div>
        </div>
    </div>
</div>
@endsection
