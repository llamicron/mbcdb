@extends('layouts.app')

@section('head')
	<title>Edit Account</title>
@endsection

@section('navbar-left')
	<li><a href="/">Home</a></li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" action="/users/{{ \Auth::user()->id }}/edit" method="post">
			<fieldset>
			{{ csrf_field() }}
			<!-- Form Name -->
			<legend>Edit Account</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-sm-4 control-label" for="textinput">Name</label>
			  <div class="col-sm-7">
			  <input id="name" name="name" type="text" value="{{ \Auth::user()->name }}" class="form-control input-md">
			  <span class="help-block"></span>
			  </div>
			</div>

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-sm-4 control-label" for="passwordinput">New Password</label>
			  <div class="col-sm-7">
			    <input id="new-password" name="new_password" type="password" placeholder="New Password" class="form-control input-md">
			    <span class="help-block"></span>
			  </div>
			</div>

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-sm-4 control-label" for="passwordinput">Confirm New Password</label>
			  <div class="col-sm-7">
			    <input id="Confirm new-password" name="confirm_new_password" type="password" placeholder="Confirm New Password" class="form-control input-md">
			    <span class="help-block"></span>
			  </div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-sm-4 control-label" for="cancel"></label>
			  <div class="col-sm-7">
			    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
					<button type="button" onClick="location='/'" class="btn btn-danger" name="cancel">Cancel</button>
					<br><br>
					<u><a href="/users/{{ \Auth::user()->id }}/delete">Delete account</a></u>
			  </div>
			</div>

			</fieldset>
			</form>


		</div>
	</div>
@endsection
