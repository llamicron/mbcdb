@extends('layouts.app')

@section('head')
  <title>Add a Counselor</title>
  {{-- Encrypting the form token so that it will post correctly --}}
  {{-- P.S. This actually isnt the fix. The real fix is the <input name="_token" down there --}}
  {{-- OR this: {{ csrf_field() }} --}}
  {{-- Just keeping this in for clarity and so future me can see my mistakes --}}
  <?php
  //  $encrypter = app('Illuminate\Encryption\Encrypter');
  //  $encrypted_token = $encrypter->encrypt(csrf_token());
  ?>
@endsection

@section('navbar-left')
  <li><a href="/home">All Counselors</a></li>
@endsection

{{-- i will need to add elements to the form to allow counselors to be related to users with Eloquent --}}
@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Add a Counselor</h1>

          <form class="form-group" action="/counselors/add" method="post">
        			{{ csrf_field() }}
							<label for="first_name">* First Name: </label>
							<input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name"><br>
							<label for="last_name">* Last Name: </label>
							<input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name"><br>
							<p style="font-weight: 900">&nbsp; Address</p>
							<div class="col-sm-3 nopadding">
								<input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Address">
							</div>
							<div class="col-sm-3 nopadding">
								<input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="City">
							</div>
							<div class="col-sm-3 nopadding">
								<input class="form-control" type="text" name="state" value="{{ old('state') }}" placeholder="State">
							</div>
							<div class="col-sm-3 nopadding">
								<input class="form-control" type="text" name="zip" value="{{ old('zip') }}" placeholder="Zip">
							</div>
              <br><br><br>
							<label for="email">* Email: </label>
              <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email"><br>
							<label for="primary_phone">* Primary Phone: </label>
              <input class="form-control" type="text" name="primary_phone" value="{{ old('primary_phone') }}" placeholder="Primary Phone"><br>
							<label for="secondary_phone">Secondary Phone: </label>
              <input class="form-control" type="text" name="secondary_phone" value="{{ old('secondary_phone') }}" placeholder="Secondary Phone"><br>
							<label for="unit_num">* Troop Number: </label>
              <input class="form-control" type="text" name="unit_num" value="{{ old('unit_num') }}" placeholder="Troop Number"><br>
							<label for="bsa_id">* BSA ID: </label>
              <input class="form-control" type="text" name="bsa_id" value="{{ old('bsa_id') }}" placeholder="BSA ID">
              <div class="text-right">
                <p class="help">
                  You can find your BSA ID on your membership card
                </p>
              </div>
              <br>
							<label for="district">* District: </label>
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
							<input type="checkbox" name="unit_only" value="1">
							<label for="unit_only">&nbsp; Unit Only</label><br>
							Does this counselor only want to teach scouts in their troop?
              <hr>
							<div class="col-sm-6 double-button">
								<button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
							</div>
							<div class="col-sm-6 double-button">
								<button type="button" class="btn btn-danger form-control" onClick="location='/home'" name="cancel">Cancel</button>
							</div>

          </form>
        <div class="text-left">
          <i>* Required field</i>
        </div>
      </div>
    </div>
@endsection
