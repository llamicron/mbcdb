@extends('layouts.app')

@section('head')
  <title>Delete User</title>
@endsection

@section('navbar-left')
  <li><a href="/admin">All users</a></li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="message-page">
				<div class="alert alert-danger">
					Warning! <br> This user will be deleted and cannot be restored. <br> Are you sure you want to delete this user?<br>
					You can delete this user alone, or you can delete all of this user's counselors. Please choose below <br>
	        <a href="/admin" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a><hr>
	        <a href="/users/{{ $user->id }}/remove?which=alone" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete This User</a>
	        <a href="/users/{{ $user->id }}/remove?which=all" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete This User & Counselors</a>
				</div>
      </div>
    </div>
  </div>
@endsection
