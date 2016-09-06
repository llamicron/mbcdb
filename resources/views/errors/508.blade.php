@extends('layouts.warning')

@section('title')
  Infinite Loop
@endsection

@section('message')
  Uh oh, Infinite Loop Detected.
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
