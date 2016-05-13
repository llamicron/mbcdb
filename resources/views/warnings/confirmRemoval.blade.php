@extends('layouts.app')

@section('head')
  <title>Delete User</title>
@endsection

@section('navbar-left')
  <li><a href="/home">All Counselors</a></li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="message-page">
        Warning! <br> This counselor will be deleted and cannot be restored. <br> Are you sure you want to delete this counselor?<br>
        <a href="/counselors/{{ $counselor->id }}/show" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a><hr>
        <a href="/counselors/{{ $counselor->id }}/remove" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete User</a>
      </div>
    </div>
  </div>
@endsection
