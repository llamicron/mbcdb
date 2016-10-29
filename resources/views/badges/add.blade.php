@extends('layouts.app')

@section('head')
<title>Add a Merit Badge</title>
@endsection

@section('header-title')
  What does {{ $counselor->name }} teach?
@endsection

@section('tray-links')

@endsection

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form action="/counselors/{{ $counselor->id }}/badges/add" method="post">
      {{ csrf_field() }}
      <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Badge</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($badges as $badge)
            <tr>
              <td class="mdl-data-table__cell--non-numeric">{{ $badge->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <br>
      <div class="col-md-6 col-md-offset-3">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
          Submit
        </button>
        <button type="button" onClick="location='/counselors/{{ $counselor->id }}/show'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
          Cancel
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
