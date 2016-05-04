@extends('layout')

@section('head')
  <title>Add a Counselor</title>
<pre>
    <button type="button" class="btn btn-primary" onClick="location='/'" name="home">Home</button>
</pre>
  {{-- Encrypting the form token so that it will post correctly --}}
  <?php
    $encrypter = app('Illuminate\Encryption\Encrypter');
    $encrypted_token = $encrypter->encrypt(csrf_token());
  ?>
@endsection


{{-- i will need to add elements to the form to allow counselors to be related to users with Eloquent --}}
@section('content')
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Add a Counselor</h1>

          <form class="form-group" action="/counselors/add" method="post">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <input class="form-control" type="text" name="first_name" placeholder="First Name"><br>
              <input class="form-control" type="text" name="last_name" placeholder="Last Name"><br>
              <input class="form-control" type="text" name="address" placeholder="Address"><br>
              <input class="form-control" type="text" name="city" placeholder="City"><br>
              <input class="form-control" type="text" name="state" placeholder="State"><br>
              <input class="form-control" type="text" name="zip" placeholder="Zip"><br>
              <input class="form-control" type="text" name="email" placeholder="Email"><br>
              <input class="form-control" type="text" name="primary_phone" placeholder="Primary Phone"><br>
              <input class="form-control" type="text" name="secondary_phone" placeholder="Secondary Phone"><br>
              <input class="form-control" type="text" name="unit_num" placeholder="Unit Number"><br>
              <input class="form-control" type="text" name="bsa_id" placeholder="BSA ID"><br>
              <hr>
              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              <input type="button" class="btn btn-danger float-right" name="cancel" value="Cancel" onClick="location='/counselors'">

          </form>
      </div>
    </div>
@endsection
