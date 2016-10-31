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
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th></th>
            <th class="mdl-data-table__cell--non-numeric">Badge</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($badges as $badge)
            <tr>
              <td>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="{{ $badge->id }}">
                  <input type="checkbox" id="{{ $badge->id }}" name="{{ $badge->name }}" class="mdl-checkbox__input">
                </label>
              </td>
              <td class="mdl-data-table__cell--non-numeric">
                {{ $badge->name }}
              </td>
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
