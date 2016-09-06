@extends('layouts.warning')

@section('title')
  I am a teapot
@endsection

@section('message')
  I am a teapot.
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
