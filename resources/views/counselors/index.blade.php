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
            <th><a href="/counselors/sortByName">Name</a></th>
            <th><a href="/counselors/sortByTroop">Troop</a></th>
            <th><a href="/counselors/sortByDistrict">District</a></th>
            <th>Badges</th>
          </tr>

        </thead>
        <tbody>
          @foreach($counselors as $counselor)
            <?php $badges = $counselor->badges; ?>
          <tr>
            <td><a href="/counselors/{{ $counselor->id }}/show">{{ $counselor->first_name}} {{ $counselor->last_name }}</a></td>
            <td>{{ $counselor->unit_num }}</td>
            <td>{{ "Arrowmoon" }}</td>
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
