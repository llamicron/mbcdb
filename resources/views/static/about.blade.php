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
      <div class="col-md-6 col-md-offset-3">
        <h2>MBCDB: Merit Badge Counselor Database</h2>
        <p class="about">
          This is an application used to record merit badge counselors in the Sam Houston Area Council.  Users can log on an add
          a counselor.  This user could be the counselor themselves, or a single person that records all the counselors in the troop.
          <hr>
          To get started, <a href="/register">register</a> or <a href="/login">login</a>
        </p>
      </div>
    </div>
  </div>
@endsection
