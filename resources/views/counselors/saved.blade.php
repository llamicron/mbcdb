@extends('layouts.app')

@section('navbar-left')
  <li><a href="/">All Counselors</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
      {{-- <HEADER> --}}
        <h2>
          <div class="pull-right">
            <button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;
              Add a Counselor
            </button>
          </div>
          Your Saved Counselors
        </h2>
      {{-- </HEADER> --}}

      {{-- <TABLE> --}}
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Troop</th>
            <th>District</th>
            <th>Council</th>
          </tr>
        </thead>
        <tbody>
          @foreach($counselors as $counselor)
            <tr>
              <td class="truncate">
                <a href="/counselors/{{ $counselor->id }}/show">
                  {{ $counselor->first_name }} {{ $counselor->last_name }}
                </a>
              </td>
              <td class="truncate"> {{ $counselor->unit_num }} </td>
              <td class="truncate"> {{ $counselor->district->name }}    </td>
              <td class="truncate"> {{ $counselor->district->council->name }}       </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    	{{-- </TABLE> --}}
    </div>
  </div>
</div>
@endsection
