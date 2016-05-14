@extends('layouts.app')

@section('head')
  <title>Manage Users</title>
@endsection

@section('navbar-left')
  <li><a href="/home">Home</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">

    <h2>All Users</h2>

          {{-- <TABLE> --}}
      <table class="table table-striped">

      <thead>

      <tr>
        <?php // TODO: Add sorting functions for users on AdminsController ?>
        <th><a href="#">Name</a></th>
        <th><a href="#">Email</a></th>
        <th><a href="#">Privileges</a></th>
        <th style=" text-align: right; ">Functions</th>
      </tr>

      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if($user->isAdmin == 1)
              Admin
            @else
              User
            @endif
          </td>
            <td style=" text-align: right; ">
              <?php // TODO: Create show method and page for the line below ?>
              <button type="button" class="btn btn-primary" onClick="location='/users/{{ $user->id }}/show'" name="view">View</button>
              <button type="button" class="btn btn=primary" onClick="location='/users/{{ $user->id }}/setAdminWarning'" name="set_admin">Set as Admin</button>
              <button type="button" class="btn btn-danger"
                onclick="location='/users/{{ $user->id }}/delete'"
                name="delete">Delete
              </button>
            </td>
        </tr>
        @endforeach
      </tbody>

      </table>
          {{-- </TABLE> --}}

  </div>
</div>
@endsection
