@extends('layouts.app')

@section('head')
  <title>Manage Users</title>
@endsection

@section('navbar-left')
  <li><a href="/home">Home</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
		<div class="row">
			<div class="col-sm-6">
				{{-- Bulk actions form --}}
				<h1>All Users</h1>
			</div>
			<div class="col-sm-6">
				<form action="/search" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="class" value="App\User">
					<input type="text" class="form-control" id="user-search" name="search" placeholder="Search Users" value="">
				</form>
			</div>
		</div>
      {{-- <TABLE> --}}
      <table class="table table-striped">

      <thead>

      <tr>
        <th><a href="/users/sortByName">Name</a></th>
        <th><a href="/users/sortByEmail">Email</a></th>
        <th><a href="/users/sortByPrivilege">Privileges</a></th>
      </tr>

      </thead>
      <tbody>
				<form action="/users/bulk" method="post">
				{{ csrf_field() }}
        @foreach($users as $user)
          <tr>
          <td class="truncate">
						<input type="checkbox" id="bulk-checkbox" name="{{ $user->name }}" value="{{ $user->id }}">
						<a href="/users/{{ $user->id }}/show">
							&nbsp;&nbsp;{{ $user->name }}
						</a>
					</td>
          <td class="truncate">{{ $user->email }}</td>
          <td class="truncate">
            @if($user->isAdmin == 1)
              Admin
            @else
              User
            @endif
          </td>
	        </tr>
				@endforeach
	      </tbody>

	      </table>
	    	{{-- </TABLE> --}}
			<div class="text-center">
				{{ $users->links() }}
			</div>

			<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<select class="form-control" name="bulk-select">
							<option name="bulk-action" value="delete">Delete</option>
							<option name="bulk-action" value="set-admin">Set as Admin</option>
						</select>
						<input class="btn btn-primary form-control double-button" type="submit" name="submit">
					</div>
				</form>
			</div>
	</div>
</div>
@endsection
