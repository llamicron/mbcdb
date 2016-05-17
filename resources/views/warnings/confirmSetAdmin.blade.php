@extends('layouts.warning')

@section('title')
  Set as Admin
@endsection

@section('message')
  <h2>
    If you set {{ $user->name }} as an admin, they will have full permission to:
    <ul class="list-group">
      <li class="list-group-item">Delete any counselor</li>
      <li class="list-group-item">Update any counselor</li>
      <li class="list-group-item">Delete any user</li>
      <li class="list-group-item">Give any user admin privileges</li>
    </ul>
    Are you sure you want to continue?
  </h2>
@endsection

@section('buttons')

<a href="/admin" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
<a href="/users/{{ $user->id }}/setAdmin" class="btn btn-lg btn-primary">Continue</a>
@endsection
