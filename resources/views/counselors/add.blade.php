@extends('layouts.app')

@section('head')
  <title>Add a Counselor</title>
  {{-- Encrypting the form token so that it will post correctly --}}
  {{-- P.S. This actually isnt the fix. The real fix is the <input name="_token" down there --}}
  {{-- Just keeping this in for clarity and so future me can see my mistakes --}}
  <?php
  //  $encrypter = app('Illuminate\Encryption\Encrypter');
  //  $encrypted_token = $encrypter->encrypt(csrf_token());
  ?>
@endsection


{{-- i will need to add elements to the form to allow counselors to be related to users with Eloquent --}}
@section('content')
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Add a Counselor</h1>

          <form class="form-group" action="/counselors/add" method="post">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-inline">
                <input class="form-control" style=" width: 45%" type="text" name="first_name" placeholder="First Name">&nbsp;&nbsp;
                <input class="form-control" style=" width: 53%" type="text" name="last_name" placeholder="Last Name">
              </div>
              <br>
              <div class="form-inline">
                <input class="form-control" style=" width: 41%" type="text" name="address" placeholder="Address">
                <input class="form-control" style=" width: 25%" type="text" name="city" placeholder="City">
                <input class="form-control" style=" width: 16%" type="text" name="state" placeholder="State">
                <input class="form-control" style=" width: 16%" type="text" name="zip" placeholder="Zip">
                <br>
              </div>
              <br>
              <input class="form-control" type="text" name="email" placeholder="Email"><br>
              <input class="form-control" type="text" name="primary_phone" placeholder="Primary Phone"><br>
              <input class="form-control" type="text" name="secondary_phone" placeholder="Secondary Phone"><br>
              <input class="form-control" type="text" name="unit_num" placeholder="Unit Number"><br>
              <input class="form-control" type="text" name="bsa_id" placeholder="BSA ID"><br>
              <button type="submit" class="btn btn-primary form-control" style=" width: 49%" name="submit">Submit</button>
              <button type="button" class="btn btn-danger form-control" style=" width: 49%" onClick="location='/home'" name="cancel">Cancel</button>
          </form>
      </div>
    </div>
@endsection
