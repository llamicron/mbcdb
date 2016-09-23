@extends('layouts.warning')

@section('title')
	This user is an Admin
@endsection

@section('message')
	This user is an admin, and you can't delete them.
@endsection

@section('buttons')
	<button type="button" class="btn btn-primary" onClick="location='/admin'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
