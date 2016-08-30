@extends('layouts.app')

@section('head')
  <title>Edit {{ $counselor->first_name . " " . $counselor->last_name }}</title>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <h1>Edit {{ $counselor->first_name . " " . $counselor->last_name}}</h1>

      <form class="form-group" action="/counselors/{{ $counselor->id }}/edit" method="post">
        <input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
					<label for="first_name">First Name: </label>
					<br>
          <input class="form-control" value="{{ $counselor->first_name }}" type="text" name="first_name" placeholder="First Name"><br>
					<label for="last_name">Last Name: </label>
          <input class="form-control" value="{{ $counselor->last_name }}" type="text" name="last_name" placeholder="Last Name"><br>
					<p style="font-weight: 900">Address: </p>
					<div class="col-sm-3 nopadding">
						<input class="form-control" value="{{ $counselor->address }}" type="text" name="address" placeholder="Address">
					</div>
					<div class="col-sm-3 nopadding">
						<input class="form-control" value="{{ $counselor->city }}" type="text" name="city" placeholder="City">
					</div>
					<div class="col-sm-3 nopadding">
						<input class="form-control" value="{{ $counselor->state }}" type="text" name="state" placeholder="State">
					</div>
					<div class="col-sm-3 nopadding">
						<input class="form-control" value="{{ $counselor->zip }}" type="text" name="zip" placeholder="Zip">
					</div>
          <br><br><br>
					<label for="email">Email: </label>
          <input class="form-control" value="{{ $counselor->email }}" type="text" name="email" placeholder="Email"><br>
					<label for="primary_phone">Primary Phone: </label>
          <input class="form-control" value="{{ $counselor->primary_phone }}" type="text" name="primary_phone" placeholder="Primary Phone"><br>
					<label for="secondary_phone">Secondary Phone: </label>
          <input class="form-control" value="{{ $counselor->secondary_phone }}" type="text" name="secondary_phone" placeholder="Secondary Phone"><br>
					<label for="unit_num">Troop Number: </label>
          <input class="form-control" value="{{ $counselor->unit_num }}" type="text" name="unit_num" placeholder="Unit Number"><br>
					<label for="bsa_id">BSA ID: </label>
          <input class="form-control" value="{{ $counselor->bsa_id }}" type="text" name="bsa_id" placeholder="BSA ID"><br>
					<input type="hidden" name="unit_only" value="false">
					<input type="checkbox" name="unit_only" value="1">
					<label for="unit_only">&nbsp; Unit Only</label><br>
					<i>Does this counselor only want to teach scouts in their troop?</i>
					<br><br>
					<div class="col-sm-6 double-button">
						<button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
					</div>
					<div class="col-sm-6 double-button">
						<button type="button" class="btn btn-danger form-control" onClick="location='/home'" name="cancel">Cancel</button>
					</div>
      </form>
    </div>
  </div>
@endsection
