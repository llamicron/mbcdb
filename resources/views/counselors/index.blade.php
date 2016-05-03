@extends('layout')

@section('head')
  <title>All Counselors</title>
@endsection


@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>All Counselors&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">Add a Counselor</button></h1>
      <ul class="list-group">
        <li class="list-group-item">

          {{-- echos out all the counselors.  no pagination yet.  yet. --}}
          @foreach($counselors as $counselor)
            <h3>{{ $counselor->first_name }} {{ $counselor->last_name }}</h3><br>
            Address:<br>
            {{ $counselor->address }}<br>
            {{ $counselor->city }} {{ $counselor->state }}, {{ $counselor->zip }}<br>
            <br>
            Email: <a href="mailto:{{ $counselor->email }}">{{ $counselor->email }}</a><br>
            Primary Phone: {{ $counselor->primary_phone }}<br>
            Secondary Phone: {{ $counselor->secondary_phone }}<br>
            <br>
            Troop {{ $counselor->unit_num }}<br>
            BSA ID: {{ $counselor->bsa_id }}<br>
            Will teach outside of unit:
            @if($counselor->unit_only == 1)
              {{ "No" }}
            @else
              {{ "Yes" }}
            @endif
            <br>
            <input TYPE="button" class="btn btn-primary" onClick="location='/'" value="Update Counselor">
            <input TYPE="button" class="btn btn-danger" onClick="location='/counselors/{{ $counselor->id }}/remove'" value="Remove Counselor">
            <hr>
          @endforeach

        </li>
      </ul>

    </div>
  </div>
@endsection
