@extends('layouts.warning')

@section('title')
  Page not Found
@endsection

@section('message')
  Uh oh. <br> Looks like that page can't be found.
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
