@extends('layouts.app')

@section('head')
  <title>Add a Counselor</title>
@endsection

@section('header-title')
  Add a New Counselor
@endsection

@section('tray-links')

@endsection

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="counselor-card mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Add a Counselor</h2>
          </div>
          <div class="mdl-card__supporting-text">


          {{-- Form --}}
          <form class="form-group" action="/counselors/add" method="post">
        			{{ csrf_field() }}
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="first_name" value="{{ old('first_name') }}" type="text" id="first_name">
                <label class="mdl-textfield__label" for="first_name">First Name</label>
              </div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="last_name" value="{{ old('last_name')}}" type="text" id="last_name">
							  <label class="mdl-textfield__label" for="last_name">Last Name</label>
							</div>

              <br>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="address" value="{{ old('address') }}" type="text" id="address">
							  <label class="mdl-textfield__label" for="address">Address</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="city" value="{{ old('city') }}" type="text" id="city">
							  <label class="mdl-textfield__label" for="city">City</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="state" value="{{ old('state') }}" type="text" id="state">
							  <label class="mdl-textfield__label" for="state">State</label>
							</div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="zip" pattern="(?![a-zA-Z]).+" value="{{ old('zip') }}" type="text" id="zip">
                <label class="mdl-textfield__label" for="zip">Zip</label>
                <span class="mdl-textfield__error">Zip must be a number</span>
              </div>

              <br><br><br>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" pattern=".+@.+\..+" name="email" value="{{ old('email') }}" type="text" id="email">
							  <label class="mdl-textfield__label" for="email">Email</label>
                <span class="mdl-textfield__error">Must be a valid email</span>
							</div>

              <br>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="primary_phone" pattern="(?![a-zA-Z]).+" value="{{ old('primary_phone') }}" type="text" id="primary_phone">
							  <label class="mdl-textfield__label" for="primary_phone">Primary Phone</label>
                <span class="mdl-textfield__error">This must be a phone number (<i>e.g. 1-800-555-1234</i>)</span>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="secondary_phone" pattern="(?![a-zA-Z]).+" value="{{ old('secondary_phone') }}" type="text" id="secondary_phone">
							  <label class="mdl-textfield__label" for="secondary_phone">Secondary Phone</label>
                <span class="mdl-textfield__error">This must be a phone number (<i>e.g. 1-800-555-1234</i>)</span>
							</div>

              <br><br>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="unit_num" pattern="(?![a-zA-Z]).+" value="{{ old('unit_num') }}" type="text" id="unit_num">
							  <label class="mdl-textfield__label" for="unit_num">Troop Number</label>
                <span class="mdl-textfield__error">Troop Number must be a number</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							  <input class="mdl-textfield__input" name="bsa_id" pattern="(?![a-zA-Z]).+" value="{{ old('bsa_id') }}" type="text" id="bsa_id">
							  <label class="mdl-textfield__label" for="bsa_id">BSA ID</label>
                <span class="mdl-textfield__error">BSA ID must be a number</span>
							</div>
              <div class="mdl-tooltip mdl-tooltip--large" for="bsa_id">
                You can find your BSA ID on your membership card
              </div>

              <br><br>

							<label for="district">District: </label>
							<select class="form-control" name="district">
								<option value="disabled" disabled selected>-- Select a District --</option>
								@foreach ($districts as $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
								@endforeach
							</select>
              <div class="text-right">
                <p class="help">
                  Your district isn't here? <a href="#feedback">Submit some feedback</a>
                </p>
              </div>
							<br>
							<input type="hidden" name="unit_only" value="false">
              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="unit_only">
                <input type="checkbox" name="unit_only" value="1" id="unit_only" class="mdl-switch__input">
                <span class="mdl-switch__label" id="unit_only_span">Unit Only?</span>
              </label>
              <br>
              <div class="mdl-tooltip mdl-tooltip--large" for="unit_only_span">
                Does this counselor only want to teach scouts in their troop?
              </div>
              <br>
              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="ypt">
                <input type="checkbox" id="ypt" name="ypt" value="1" class="mdl-switch__input">
                <span class="mdl-switch__label">YPT Certified?</span>
              </label>
              <hr>
              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                Submit
              </button>
              <button type="button" onClick="location='/'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
                Cancel
              </button>
          </form>
          {{-- End Form --}}
        </div>
      </div>
      </div>
    </div>
@endsection
