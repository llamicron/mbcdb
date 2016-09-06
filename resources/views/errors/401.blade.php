@extends('layouts.warning')

@section('title')
  Unauthorized
@endsection

@section('message')
  Sorry, But You're Not Authorized
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
