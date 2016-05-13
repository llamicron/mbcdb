@extends('layouts.app')

@section('head')
  <title><span class="glyphicon glyphicon-plus"></span>&nbsp;Add a Counselor</title>
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
      <div class="col-md-6 col-md-offset-3">
        <h1><span class="glyphicon glyphicon-plus"></span>&nbsp;Add a Counselor</h1>

          <form class="form-group" action="/counselors/add" method="post">

            {{ csrf_field() }}

              <div class="form-inline">
                <input class="form-control" style=" width: 45%" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="* First Name">&nbsp;&nbsp;
                <input class="form-control" style=" width: 53%" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="* Last Name">
              </div>
              <br>
              <div class="form-inline">
                <input class="form-control" style=" width: 41%" type="text" name="address" value="{{ old('address') }}" placeholder="Address">
                <input class="form-control" style=" width: 25%" type="text" name="city" value="{{ old('city') }}" placeholder="City">
                <input class="form-control" style=" width: 16%" type="text" name="state" value="{{ old('state') }}" placeholder="State">
                <input class="form-control" style=" width: 16%" type="text" name="zip" value="{{ old('zip') }}" placeholder="Zip">
                <br>
              </div>
              <br>
              <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="* Email"><br>
              <input class="form-control" type="text" name="primary_phone" value="{{ old('primary_phone') }}" placeholder="* Primary Phone"><br>
              <input class="form-control" type="text" name="secondary_phone" value="{{ old('secondary_phone') }}" placeholder="Secondary Phone"><br>
              <input class="form-control" type="text" name="unit_num" value="{{ old('unit_num') }}" placeholder="* Unit Number"><br>
              <input class="form-control" type="text" name="bsa_id" value="{{ old('bsa_id') }}" placeholder="* BSA ID"><br>
              <select class="form-control" placeholder="* District" name="district">
                <option value="disabled" disabled selected>* Select a District</option>
                @foreach ($districts as $district)
                  <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
              </select>
              <hr>
              &nbsp;<button type="submit" class="btn btn-primary form-control" style=" width: 49%" name="submit">Submit</button>
              <button type="button" class="btn btn-danger form-control" style=" width: 49%" onClick="location='/home'" name="cancel">Cancel</button>
          </form>
            <div class="text-left">
              <i>* Required field</i>
            </div>
            @if(count($errors))
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
      </div>
    </div>
@endsection
