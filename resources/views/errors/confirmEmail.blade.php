@extends('layouts.warning')

@section('title')
	confirm email
@endsection

@section('message')
	Please confirm your email before logging in
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/login'" name="button"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Refresh</button>
@endsection
