@extends('layouts.warning')

@section('title')
	Delete {{ $item }}
@endsection

@section('message')
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
@endsection
