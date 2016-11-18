@extends('layouts.app')

@section('head')
  <title>Confirm Email</title>
@endsection

@section('header-title')
	Confirm Email
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="mdl-card mdl-shadow--4dp" id="confirm_email_card">

          <h3>Confirm your email</h3>

        <div class="mdl-card__supporting-text">
          <strong>
						We just sent you an email. Please confirm it before logging in.
          </strong>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection