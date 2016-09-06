@extends('layouts.warning')

@section('title')
  Request Timeout
@endsection

@section('message')
  Request Timeout
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
  <button type="button" class="btn btn-primary" http-equiv="refresh" name="button"><span class="glyphicon glyphicon-repeat"></span>&nbsp;Refresh</button>
@endsection
