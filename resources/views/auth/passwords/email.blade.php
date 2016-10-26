@extends('layouts.login')

@section('head')
	<title>Reset Password</title>
@endsection

@section('header-title')
	Reset Password
@endsection

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
					<div class="login-card mdl-card mdl-shadow--4dp">
						<div class="mdl-card__title mdl-card--expand">
							<h2 class="mdl-card__title-text">Reset Password</h2>
						</div>
						<div class="mdl-card__supporting-text">
							@if (session('status'))
									<span class="mdl-chip">
										<span class="mdl-chip__text">
											{{ session('status') }}
										</span>
									</span>
							@endif
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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
						</div>
						<div class="mdl-card__actions mdl-card--border">
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
								Send Password Reset Link
							</button>
						</div>
					</form>
				</div>


							{{--
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
