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
      <div class="mdl-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Confirm Email</h2>
        </div>
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
