@extends('layouts.app')

@section('head')
	<title>Search Results</title>
@endsection



@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-6">
					<h1>Search Results</h1>
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
				@foreach ($results as $users)
					@foreach ($users as $user)

	          <tr>
	          <td class="truncate"><a href="/users/{{ $user->id }}/show">{{ $user->name }}</a></td>
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
				@endforeach
      </tbody>

      </table>
    	{{-- </TABLE> --}}
		</div>
	</div>
@endsection
