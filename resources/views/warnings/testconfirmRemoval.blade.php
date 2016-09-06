@extends('layouts.app')

@section('head')
  <title>Delete {{ $item }}</title>
@endsection

@section('navbar-left')
  <li><a href="/home">All {{ $item }}</a></li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="message-page">
				Warning! <br> This {{ $item }} will be deleted and cannot be restored. <br> Are you sure you want to delete this {{ $item }}?<br>
        @if (isset($counselor))
          <a href="/counselors/{{ $counselor->id }}/show" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a>
          <hr>
          <a href="/counselors/{{ $counselor->id }}/remove" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete {{ $item }}</a>
        @endif
        @if (isset($user))
          <a href="/admin" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a>
          <hr>
          <a href="/users/{{ $user->id }}/remove" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete {{ $item }}</a>
        @endif
      </div>
    </div>
  </div>
@endsection
