@extends('layout')

@section('head')
  <title>All Counselors</title>
@endsection


@section('content')
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-md-8 col-md-offset-1">
      <br>
      <ul class="list-group">
        <li class="list-group-item">
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
            @if (isset($counselor->district))
              {{ $counselor->district->name }} District<br>
            @endif
            BSA ID: {{ $counselor->bsa_id }}<br>
            Will teach outside of unit:
            @if($counselor->unit_only == 1)
              {{ "No" }}
            @else
              {{ "Yes" }}
            @endif
            <br>
            <h3>Badges This Counselor Teaches:</h3>

            <ul>
              @foreach($badges as $badge)
                <li>
                  {{ $badge->name }}
                </li>
              @endforeach
            </ul>
            <br>
            <input TYPE="button" class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/badges/add'" value="Add A Badge To This Counselor">
            <input TYPE="button" class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/edit'" value="Update Counselor">
            <input TYPE="button" class="btn btn-danger" onClick="location='/counselors/{{ $counselor->id }}/remove'" value="Remove Counselor">
        </li>
      </ul>

    </div>
  </div>
@endsection
