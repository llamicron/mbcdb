@extends('layouts.app')

@section('head')
  <title>Search Results</title>
@endsection

@section('navbar-left')
    <li><a href="/home">All Counselors</a></li>
    <li><a href="/counselors/{{ $user->id }}">Your Counselors</a></li>
    <li><a href="/counselors/add">Add a Counselor</a></li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
              {{-- <HEADER> --}}
        <h2>
          <div class="pull-left">
            Search Results
          </div>
          <div class="pull-right">
            <button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;
              Add a Counselor
            </button>
          </div>
        </h2>

        <div class="text-center">
          <i>Click a column name to sort</i>
        </div>
              {{-- </HEADER> --}}


              {{-- <TABLE> --}}
        <table class="table table-striped">

          <thead>

            <tr>
              <th><a href="/home">Name</a></th>
              <th><a href="/sortByTroop">Troop</a></th>
              <th><a href="/sortByDistrict">District</a></th>
              <th><a href="#">Council</a></th>
              <th></th>
            </tr>

          </thead>
          <tbody>

            @foreach($results as $counselor)
            <tr>
              <td>
                <a href="/counselors/{{ $counselor->id }}/show">
                  {{ $counselor->first_name }} {{ $counselor->last_name }}
                </a>
              </td>
              <td> {{ $counselor->unit_num }} </td>
              <td> {{ $counselor->district->name }}    </td>
              <td> {{ $counselor->district->council->name }}       </td>
              <td>
                <div class="pull-right">
                  <button type="button" class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/show'" name="view">
                    <span class="glyphicon glyphicon-zoom-in"></span>&nbsp;
                    View
                  </button>
                </div>
              </td>
            </tr>

          @endforeach

          </tbody>

        </table>
    {{-- </TABLE> --}}
      </div>
    </div>
  </div>
</div>
@endsection