@extends('layouts.warning')

@section('title')
  Gateway Timeout
@endsection

@section('message')
  Gateway Timeout
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
