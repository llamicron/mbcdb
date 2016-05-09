@extends('layouts.app')

@section('head')
  <title>All Counselors</title>
@endsection

@section('navbar-left')
  <li><a href="/counselors/add">Add a Counselor</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">

              {{-- <HEADER> --}}
        <h2>
          <div class="pull-right">
            <button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">
              Add a Counselor
            </button>
          </div>
          All Counselors
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
          </tr>

        </thead>
        <tbody>

          @foreach($counselors as $counselor)
            <?php
               // This PHP must be nested inside the foreach loop.  I am probably not doing this right,
               // and i think i should put this in the controller, but i dont know how
               // becuase we haven't pulled the induvidual counselors out of the Eloquent collection
               $badges = $counselor->badges;
               $district = $counselor->district;
               $council = $district->council
             ?>
          <tr>
            <td>
              <a href="/counselors/{{ $counselor->id }}/show">
                {{ $counselor->first_name}} {{ $counselor->last_name }}
              </a>
            </td>
            <td> {{ $counselor->unit_num }} </td>
            <td> {{ $district->name }}    </td>
            <td> {{ $council->name }}       </td>
          </tr>

        @endforeach
        </tbody>

      </table>
              {{-- </TABLE> --}}

    </div>
  </div>
</div>
@endsection
