@extends('layouts.app')

@section('head')
	<title>Register</title>
@endsection

@section('header-title')
	Register
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="mdl-card mdl-shadow--4dp">
				<div class="mdl-card__title mdl-card--expand">
					<h2 class="mdl-card__title-text">Register</h2>
				</div>
				<div class="mdl-card__supporting-text">
					{{-- Content --}}
					<form action="{{ url('/register') }}" role="form" method="post">
						{{ csrf_field() }}
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" value="{{ old('name') }}" name="name" type="text" id="name">
							<label class="mdl-textfield__label" for="name">Name</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" value="{{ old('email') }}" name="email" type="text" id="email">
							<label class="mdl-textfield__label" for="email">Email</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" name="password" type="password" id="password">
							<label class="mdl-textfield__label" for="password">Password</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" name="password_confirmation" type="password" id="password_confirmation">
							<label class="mdl-textfield__label" for="password_confirmation">Confirm Password</label>
						</div>

					</div>
					<div class="mdl-card__actions mdl-card--border">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
							Submit
						</button>
						<button type="button" onClick="location='/login'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
							Cancel
						</button>
						</form>
					</div>
			</div>

		</div>
	</div>
</div>

{{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

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

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>Register
            </button>
        </div>
    </div>
</form> --}}
@endsection
