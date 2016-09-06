@extends('layouts.app')

@section('head')
	<title>Remove Badge</title>
@endsection

@section('navbar-left')
	<li><a href="/">All Counselors</a></li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<h3>Select Badges to Remove</h3>
			<hr>
			<form action="/counselors/{{ $counselor->id }}/badges/remove" method="post">
				{{ csrf_field() }}
				@foreach ($counselor->badges as $badge)
					<li>
						<input type="checkbox" name="{{ $badge->name }}" value="{{ $badge->id }}">&nbsp;
						{{ $badge->name }}
					</li>
				@endforeach
				<hr>
				<button class="btn btn-primary double-button" type="submit" name="submit">Submit</button>
				<button type="button" class="btn btn-danger double-button" onClick="location='/counselors/{{ $counselor->id }}/show'" name="cancel">Cancel</button>
			</form>

		</div>
	</div>
@endsection
