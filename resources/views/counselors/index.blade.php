@extends('layouts.app')

@section('head')
  <title>All Counselors</title>
@endsection

{{-- $context variable is passed from CounselorsController.  It's set to "userCounselors" when you click the link below
to view the authed user's counselors --}}

@section('navbar-left')
  @if(isset($context) && $context == 'userCounselors')
    <li><a href="/home">All Counselors</a></li>
  @else
    <li><a href="/counselors/{{ Auth::user()->id }}">Your Counselors</a></li>
  @endif
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
          {{-- checks context --}}
          @if(isset($context) && $context == "userCounselors")
            Your Counselors
          @else
            All Counselors
          @endif
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
			<div class="text-center">
				{{ $counselors->links() }}
			</div>
    </div>
  </div>
</div>

@endsection
