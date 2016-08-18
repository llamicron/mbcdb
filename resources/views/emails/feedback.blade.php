@extends('layouts.email')

@section('head')
	<title>{{ $subject }}</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<p>
				{{ $letter }}
			</p>

			<p>
				From: {{ $from }}
			</p>

		</div>
	</div>
@endsection
