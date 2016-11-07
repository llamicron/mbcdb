@extends('layouts.app')

@section('head')
  <title>Search Results</title>
@endsection

@section('header-title')
  Search Results
@endsection

@section('right-header')
  <form class="admin-search-form" action="/search" id="admin-search-form" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="class" value="App\User">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" name="search" type="text" id="search">
      <label class="mdl-textfield__label" for="search">Search</label>
    </div>
  </form>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      {{-- Table --}}
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell">ID</th>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th class="mdl-data-table__cell--non-numeric">Email</th>
            <th class="mdl-data-table__cell--non-numeric">Role</th>
          </tr>
        </thead>
        <tbody>
					@foreach ($results as $users)
	          @foreach ($users as $user)
	            <tr onClick="location='/users/{{ $user->id }}/show'">
	              <td class="mdl-data-table__cell">{{ $user->id }}</td>
	              <td class="mdl-data-table__cell--non-numeric">{{ $user->name }}</td>
	              <td class="mdl-data-table__cell--non-numeric">{{ $user->email }}</td>
	              <td class="mdl-data-table__cell--non-numeric">
	                @if ($user->isAdmin == 1)
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
      {{-- End New Table --}}
			<div class="text-center">
				{{ $users->links() }}
      </div>
  	</div>
  </div>
</div>
@endsection




