@extends('layouts.warning')

@section('title')
	Are You Sure?
@endsection

@section('message')
	Are you sure you want to delete this user? The counselors that this user owns will <i>not</i> be deleted.<br>Please type the name of this user to delete it.
@endsection

@section('buttons')

	<div class="col-md-4 col-md-offset-4">
		<form action="/users/{{ $user->id }}/delete" method="post">
			{{ csrf_field()  }}
			<input type="text" name="name" class="form-control" placeholder="Name">
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Delete User</button>
			<button type="button" class="btn btn-danger" onClick="location='/users/self/edit'" name="cancel">Cancel</button>
		</form>
		@if (\Session::has('error'))
			<hr>
			<div class="alert alert-danger"><li>{{ \Session::get('error') }}</li></div>
		@endif
		@if($errors->has())
			<hr>
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger"><li>{{ $error }}</li></div>
			@endforeach
		@endif
	</div>
@endsection
