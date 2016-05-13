@extends('layouts.warning')

@section('title')
  Bad Request
@endsection

@section('message')
  Oops, Bad Request
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
