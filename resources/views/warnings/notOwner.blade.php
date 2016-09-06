@extends('layouts.warning')

@section('title')
	Unauthorized
@endsection

@section('message')
  Sorry, but you're not authorized to do this
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
