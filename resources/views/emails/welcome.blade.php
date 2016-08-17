@extends('layouts.email')

@section('head')
	<title>Welcome</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Thanks for signing up!</h2>
			To get started, please verify your account by <a href="{{ url("/users/verify?token=$token") }}">clicking this link</a><br>
			<i>If you have any questions,</i> just send an email to <a href="mailto:mbcdb.help@gmail.com">mbcdb.help@gmail.com</a><br>
			<br>
			<hr>
			Thanks,<br>
			- MBCDB Support
			<br>
		</div>
	</div>
@endsection
