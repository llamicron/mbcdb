@extends('layouts.app')

@section('head')
  <title>All Counselors</title>
@endsection

@section('navbar-left')
    <li><a href="/home">All Counselors</a></li>
    <li><a href="/counselors/add">Add a Counselor</a></li>
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
            Email: <a href="mailto:{{ $counselor->email }}">{{ $counselor->email }}</a><br>
            Primary Phone: {{ $counselor->primary_phone }}<br>
            @if(isset($counselor->secondary))
              Secondary Phone: {{ $counselor->secondary_phone }}<br>
            @endif
            <br>
            Troop {{ $counselor->unit_num }}<br>
              {{ $counselor->district->name }} District<br>
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
        </li>
        <br>
        @if($counselor->user_id == $user->id || $user->isAdmin)
          <button class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/badges/add'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add A Badge To This Counselor</button>
          <button class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/edit'"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Counselor</button>
          <button class="btn btn-danger" onClick="location='/counselors/{{ $counselor->id }}/confirmRemoval'">Remove Counselor</button>
        @endif
      </ul>

    </div>
  </div>
@endsection
