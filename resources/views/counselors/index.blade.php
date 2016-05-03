@extends('layout')

@section('head')
  <title>All Counselors</title>
@endsection


@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>All Counselors</h1>
      <ul class="list-group">
        <li class="list-group-item">
          @foreach($counselors as $counselor)
            {{ $counselor->first_name }} {{ $counselor->last_name }}<br>
            {{ $counselor->address }}<br>
            {{ $counselor->city }} {{ $counselor->state }}, {{ $counselor->zip }}<br>
            {{ $counselor->email }}<br>
            {{ $counselor->secondary_phone }}<br>
            {{ $counselor->unit_type }} {{ $counselor->unit_num }}<br>
            BSA ID: {{ $counselor->bsa_id }}<br>
          @endforeach
          <hr>
          <input TYPE="button" class="btn btn-primary" onClick="location='/'" value="Update Counselor">
          <input TYPE="button" class="btn btn-danger" onClick="location='/'" value="Remove Counselor">
        </li>
      </ul>

    </div>
  </div>
@endsection
