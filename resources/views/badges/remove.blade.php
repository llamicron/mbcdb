@extends('layouts.app')

@section('head')
  <title>Remove Badges</title>
@endsection

@section('header-title')
  Remove Badges
@endsection

@section('tray-links')

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Remove Badges</h2>
        </div>
        <div class="mdl-card__supporting-text">
          {{-- Content --}}
          <i>
            Please select badges that you wish to remove
          </i>
          <br><br>
          <form action="/counselors/{{ $counselor->id }}/badges/edit" method="post">
            {{ csrf_field() }}
            @foreach ($badges as $badge)
              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="{{ $badge->id }}">
                <input type="checkbox" id="{{ $badge->id }}" value="{{ $badge->id }}" name="{{ $badge->name }}" class="mdl-switch__input">
                <span class="mdl-switch__label">{{ $badge->name }}</span>
              </label>
            @endforeach


        </div>
        <div class="mdl-card__actions mdl-card--border">
          {{-- Buttons --}}
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Submit
          </button>
          <button type="button" onClick="location='/counselors/{{ $counselor->id }}/show'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
            Cancel
          </button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection