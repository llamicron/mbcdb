@extends('layout')

@section('head')

@endsection

@section('content')
  <div class="row">
    <div class="col-md-3 col-md-offset-1">
      <h1>Add a Counselor</h1>

        <form class="form-group" action="/counselors/{{ $counselor->id }}/edit" method="post">
          {!! method_field('PATCH') !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <input value="{{ $counselor->first_name }}" class="form-control" type="text" name="first_name" placeholder="First Name"><br>
              <input value="{{ $counselor->last_name }}" class="form-control" type="text" name="last_name" placeholder="Last Name"><br>
              <input value="{{ $counselor->address }}" class="form-control" type="text" name="address" placeholder="Address"><br>
              <input value="{{ $counselor->city }}" class="form-control" type="text" name="city" placeholder="City"><br>
              <input value="{{ $counselor->state }}" class="form-control" type="text" name="state" placeholder="State"><br>
              <input value="{{ $counselor->zip }}" class="form-control" type="text" name="zip" placeholder="Zip"><br>
              <input value="{{ $counselor->email }}" class="form-control" type="text" name="email" placeholder="Email"><br>
              <input value="{{ $counselor->primary_phone }}" class="form-control" type="text" name="primary_phone" placeholder="Primary Phone"><br>
              <input value="{{ $counselor->secondary_phone }}" class="form-control" type="text" name="secondary_phone" placeholder="Secondary Phone"><br>
              <input value="{{ $counselor->unit_num }}" class="form-control" type="text" name="unit_num" placeholder="Unit Number"><br>
              <input value="{{ $counselor->bsa_id }}" class="form-control" type="text" name="bsa_id" placeholder="BSA ID"><br>
              <input value="{{ $counselor->unit_only }}" type="checkbox" name="unit_only" value="1">&nbsp;Unit only?<br>
              <hr>
              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              <input type="button" class="btn btn-danger float-right" name="cancel" value="Cancel" onClick="location='/counselors'">

        </form>
    </div>
  </div>
@endsection
