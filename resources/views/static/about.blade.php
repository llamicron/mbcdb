@extends('layouts.app')

@section('head')
  <title>About</title>
@endsection

@section('navbar-left')
  <li><a href="/home">All Counselors</a></li>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>MBCDB: Merit Badge Counselor Database</h2>
        <p class="about">
          MBCDB is an application used to record merit badge counselors in the Sam Houston Area Council.  A representative from a troop
					can create an account, and add a record of all the counselors in their troop. Keeping a record of merit badge couselors will help scouts find
					the appropriate counselor in their area, and with troop record keeping.
					<div class="alert alert-info">
						<i>Reminder: Scouts can earn a badge with a counselor that is not in their troop</i>
					</div>
          <hr>
					@if (Auth::guest())
						To get started, <a href="/register">register</a> or <a href="/login">login</a>
					@endif
        </p>
      </div>
    </div>
  </div>
@endsection
