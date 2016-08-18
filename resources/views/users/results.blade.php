@extends('layouts.app')

@section('head')
	<title>Search Results</title>
@endsection

@section('navbar-left')
	<li><a href="/admin">All Users</a></li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

		<h2>
			<form class="" action="/search" method="post">
				{{ csrf_field() }}
				Search Results
				<input type="hidden" name="class" value="App\User">
			 	<input type="test" class="form-control" style="width: 15%; float: right" name="search" placeholder="Search Users" value="">
			</form>
		</h2>


			{{-- <TABLE> --}}
      <table class="table table-striped">

      <thead>

      <tr>
        <th><a href="/users/sortByName">Name</a></th>
        <th><a href="/users/sortByEmail">Email</a></th>
        <th><a href="/users/sortByPrivilege">Privileges</a></th>
        <th style=" text-align: right; ">Functions</th>
      </tr>

      </thead>
      <tbody>
				@foreach ($results as $users)
	        @foreach($users as $user)
	          <tr>
	          <td><a href="/users/{{ $user->id }}/show">{{ $user->name }}</a></td>
	          <td>{{ $user->email }}</td>
	          <td>
	            @if($user->isAdmin == 1)
	              Admin
	            @else
	              User
	            @endif
	          </td>
	            <td style=" text-align: right; ">
	              <button type="button" class="btn btn-primary" onClick="location='/users/{{ $user->id }}/show'" name="view">View</button>
	              <button type="button" class="btn btn=primary" onClick="location='/users/{{ $user->id }}/setAdminWarning'" name="set_admin">Set as Admin</button>
	              <button type="button" class="btn btn-danger"
	                onclick="location='/users/{{ $user->id }}/confirmRemoval'"
	                name="delete">Delete
	              </button>
	            </td>
	        </tr>
	        @endforeach
				@endforeach
      </tbody>

      </table>
    	{{-- </TABLE> --}}

		</div>
	</div>
@endsection