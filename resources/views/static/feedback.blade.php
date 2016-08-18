@extends('layouts.app')

@section('head')
	<title>Feedback</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<form class="form-horizontal" action="/feedback" method="post">
			<fieldset>

			{{ csrf_field() }}

			<!-- Form Name -->
			<legend>Feedback</legend>

			<!-- Subject input-->
			<div class="form-group">
			  <label class="col-md-2 control-label" for="subject">Subject</label>
			  <div class="col-md-10">
			  <input id="subject" name="subject" type="text" class="form-control input-md">
			  </div>
			</div>

			<!-- Message input-->
			<div class="form-group">
				<label class="col-md-2 control-label" for="message">Message</label>
				<div class="col-md-10">
				<textarea name="message" class="form-control" rows="8" cols="40"></textarea>
				</div>
			</div>


			<!-- From input-->
			<div class="form-group">
			  <label class="col-md-2 control-label" for="from">From: </label>
			  <div class="col-md-10">
			  <input id="from" name="from" type="text" placeholder="example@gmail.com" value="{{ Auth::user()->email }}" class="form-control input-md">
			  </div>
			</div>

			<!-- Type of Feedback -->
			<div class="checkbox">
				<label><input class="" name="type" type="checkbox" value="bug">Is this a bug report?</label>
			</div>
			<br>

			<!-- Send Button -->
			<div class="form-group">
			  <div class="col-md-8 col-md-offset-2">
					<button id="send" name="send" class="form-control btn btn-success"><span class="glyphicon glyphicon-send">&nbsp;</span>Send</button>
			  </div>
			</div>

			</fieldset>
			</form>
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<button onClick="location='/'" name="cancel" class="form-control btn btn-danger"><span class="glyphicon glyphicon-trash">&nbsp;</span>Cancel</button>
			</div>

		</div>
	</div>
@endsection
