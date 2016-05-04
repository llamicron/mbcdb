@extends('layout')

@section('head')
  <title>All Counselors</title>
@endsection


@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
      <h2>
        All Counselors
        &nbsp;<button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">Add a Counselor</button>
      </h2>
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
            {{-- This is not the proper way to do this, but i cant think of another way --}}
            {{-- The badges list must be retrieved from within the foreach loop --}}
            {{-- NEED HELP PLEASE HELP SEND HELP PLS --}}
            <?php $badges = $counselor->badges ?>
            <td>
              @foreach ($badges as $badge)
                {{ $badge->name . ", " }}
              @endforeach
            </td>
          </tr>

        @endforeach
        </tbody>

      </table>
    </div>
  </div>
</div>
@endsection
