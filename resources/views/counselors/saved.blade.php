@extends('layouts.app')

@section('header-title')
  Saved Counselors
@endsection

@section('tray-links')

@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th class="mdl-data-table__cell--non-numeric">Troop</th>
            <th class="mdl-data-table__cell--non-numeric">District</th>
            <th class="mdl-data-table__cell--non-numeric">Council</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($counselors as $counselor)
            <tr onClick="location='/counselors/{{ $counselor->id }}/show'">
              <td class="mdl-data-table__cell--non-numeric">{{ $counselor->name }}</td>
              <td class="mdl-data-table__cell--non-numeric">{{ $counselor->unit_num }}</td>
              <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->name }}</td>
              <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->council->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>


      {{-- <table class="table table-striped">
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
      </table> --}}
    	{{-- </TABLE> --}}
    </div>
  </div>
</div>
@endsection
