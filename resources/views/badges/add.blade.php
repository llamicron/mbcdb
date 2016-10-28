@extends('layouts.app')

@section('head')
<title>Add a Merit Badge</title>
@endsection

@section('header-title')
  What does {{ $counselor->name }} teach?
@endsection

@section('tray-links')
  <a class="mdl-navigation__link" href="/">All Counselors</a>
  <a class="mdl-navigation__link" href="/counselors/{{ $counselor->id }}">Your Counselors</a>
  <a class="mdl-navigation__link" href="/saved">Favorited Counselors</a>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <br><br>
      <form class="form-group" action="/counselors/{{ $counselor->id }}/badges/add" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @foreach ($chunks as $badges)
            <div class="col-md-4 badges">
              @foreach($badges as $badge)
                {{-- <div class="checkbox">
                  <label><input type="checkbox" id="badges" name="{{ $badge->name }}" value="{{ $badge->id }}">{{ $badge->name }}</label>
                </div> --}}
                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="{{ $badge->id }}">
                  <input type="checkbox" id="{{ $badge->id }}" name="{{ $badge->name }}" value="{{ $badge->id }}" class="mdl-switch__input">
                  <span class="mdl-switch__label">{{ $badge->name }}</span>
                </label>
              @endforeach
              <hr>
            </div>
        @endforeach

        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
          Add Badges
        </button>
        <button type="button" onClick="location='/counselors/{{ $counselor->id }}/show'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
          Cancel
        </button>
    </form>
    </div>
  </div>
@endsection
