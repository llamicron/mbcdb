@extends('layouts.app')

@section('head')
  <title>{{ $user->name}}</title>
@endsection

@section('navbar-left')
  <li><a href="/admin">All Users</a></li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <ul class="list-group">
        <li class="list-group-item">
          <h2>{{ $user->name }}</h2><br>
          Email: {{ $user->email }}<br>
          Role:
          @if($user->isAdmin == 1)
            {{ "Admin" }}
          @else
            {{ "User" }}
          @endif
          <br>

          <h2>This user's counselors</h2>
          <ul>
            @foreach($counselors as $counselor)
              <li><a href="/counselors/{{ $counselor->id }}/show">{{ $counselor->first_name . " " . $counselor->last_name}}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>
      <button type="button" class="btn btn-danger" onClick="location='/users/{{ $user->id }}/confirmRemoval'" name="delete">Delete User</button>
    </div>
  </div>
@endsection
