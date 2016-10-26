@extends('layouts.app')

@section('head')
  <title>Edit {{ $counselor->first_name . " " . $counselor->last_name }}</title>
@endsection

@section('header-title')
  Edit {{ $counselor->name }}
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <div class="counselor-card mdl-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Edit {{ $counselor->name }}</h2>
        </div>
        <div class="mdl-card__supporting-text">
          {{-- Content --}}
          <form class="form-group" action="/counselors/{{ $counselor->id }}/edit" method="post">
            {{ csrf_field() }}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->first_name }}" name="first_name" type="text" id="first_name">
              <label class="mdl-textfield__label" for="first_name">First Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->last_name }}" name="last_name" type="text" id="last_name">
              <label class="mdl-textfield__label" for="last_name">Last Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->address }}" name="address" type="text" id="address">
              <label class="mdl-textfield__label" for="address">Address</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->city }}" name="city" type="text" id="city">
              <label class="mdl-textfield__label" for="city">City</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->state }}" name="state" type="text" id="state">
              <label class="mdl-textfield__label" for="state">State</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->zip }}" name="zip" type="text" id="zip">
              <label class="mdl-textfield__label" for="zip">Zip</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->email }}" name="email" type="text" id="email">
              <label class="mdl-textfield__label" for="email">Email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->primary_phone }}" name="primary_phone" type="text" id="primary_phone">
              <label class="mdl-textfield__label" for="primary_phone">Primary Phone</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->secondary_phone }}" name="secondary_phone" type="text" id="secondary_phone">
              <label class="mdl-textfield__label" for="secondary_phone">Secondary Phone</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->unit_num }}" name="unit_num" type="text" id="unit_num">
              <label class="mdl-textfield__label" for="unit_num">Troop</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="{{ $counselor->bsa_id }}" name="bsa_id" type="text" id="bsa_id">
              <label class="mdl-textfield__label" for="bsa_id">BSA ID</label>
            </div>
            <input type="hidden" name="unit_only" value="false">
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="unit_only">
              <input type="checkbox" value="1" id="unit_only" name="unit_only" class="mdl-switch__input">
              <span id="unit_only_label" class="mdl-switch__label">Unit Only</span>
            </label>
            <!-- for="" should be the id of the element the tt is attached to -->
            <div class="mdl-tooltip mdl-tooltip--large" for="unit_only_label">
              Does this counselor only want to teach scouts in their troop?
            </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          {{-- Buttons --}}
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Submit
          </button>

          <button type="button" onClick="location='/'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
            Cancel
          </button>
        </div>
      </form>
    </div>

    </div>
  </div>
@endsection
