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
						@if ($user->counselors->isEmpty())
							<li><i>This user doesn't have any counselors</i></li>
						@else
	            @foreach($user->counselors as $counselor)
	              <li><a href="/counselors/{{ $counselor->id }}/show">{{ $counselor->first_name . " " . $counselor->last_name}}</a></li>
	          	@endforeach
						@endif
          </ul>
        </li>
      </ul>
			<button type="button" class="btn btn-danger double-button" onClick="location='#confirm'" name="delete"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete User</button>
			<button type="button" onClick="location='#confirm2'" class="btn btn-primary double-button" name="setAdmin"><span class="glyphicon glyphicon-arrow-up"></span>&nbsp;Make this user an Administrator</button>
    </div>
  </div>
@endsection

@section('confirm-title')
  Are You Sure?
@endsection

@section('confirm-content')
  <div class="alert alert-danger">
    <div class="text-center">
      <strong>This user will be deleted and cannot be restored. <br> Are you sure?</strong>
      <button type="button" class="btn btn-primary confirm-button" onClick="location='/users/{{ $user->id }}/remove?which=alone'" name="confirm">Yes, I'm Sure. Delete this User</button>
      <hr>
      <p>
        You can delete this user alone, or you can delete all the counselors that this user owns.
      </p>
      <button type="button" class="btn btn-primary confirm-button" onClick="location='/users/{{ $user->id }}/remove?which=all'" name="delete-all">Delete User and Counselors</button>
    </div>
  </div>
@endsection

@section('confirm2-title')
  Are You Sure?
@endsection

@section('confirm2-content')
  <div class="alert alert-danger">
    <div class="text-center">
      <strong>This user will have full administrator access, and will not be able to be deleted or demoted. <br> Are you sure?</strong>
    </div>
    <button type="button" class="btn btn-primary confirm-button" onClick="location='/users/{{ $user->id }}/setAdmin'" name="confirm-admin">Yes, I'm Sure</button>
  </div>
@endsection
