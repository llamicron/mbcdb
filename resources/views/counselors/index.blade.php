@extends('layout')

@section('head')
  <title>All Counselors</title>
@endsection


@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
      <h2>All Counselors</h2>
      <table class="table table-striped">

        <thead>

          <tr>
            <th>Name</th>
            <th>Troop</th>
            <th>District</th>
            <th>Badges</th>
          </tr>

        </thead>

        <tbody>
          @foreach($counselors as $counselor)

          <tr>
            <td><a href="/counselors/{{ $counselor->id }}/show">{{ $counselor->first_name}} {{ $counselor->last_name }}</a></td>
            <td>{{ $counselor->unit_num }}</td>
            <td>{{ $counselor->district }}</td>
            {{-- Will work someday *tear* --}}
            {{-- <td>{{ $counselor->badges }}</td> --}}
            <td>Placeholder</td>
          </tr>

        @endforeach
        </tbody>

      </table>
    </div>
  </div>
</div>
@endsection
