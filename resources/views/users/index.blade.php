@extends('layouts.app')

@section('head')
  <title>Manage Users</title>
@endsection

@section('header-title')
  All Users
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">


      {{-- Table --}}
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th class="mdl-data-table__cell--non-numeric">Email</th>
            <th class="mdl-data-table__cell--non-numeric">Role</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr onClick="location='/users/{{ $user->id }}/show'">
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
        </tbody>
      </table>
      {{-- End New Table --}}
			<div class="text-center">
				{{ $users->links() }}
      </div>
      <div class="text-right">
        <button onClick="location='/usersEmails'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
          Get all emails
        </button>
      </div>
  	</div>
  </div>
</div>
@endsection




