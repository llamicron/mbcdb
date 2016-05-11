@extends('layouts.app')

@section('head')

@endsection

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Edit {{ $counselor->first_name . " " . $counselor->last_name}}</h1>

      <form class="form-group" action="/counselors/{{ $counselor->id }}/edit" method="post">
        <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-inline">
            <input class="form-control" value="{{ $counselor->first_name }}" style=" width: 45%" type="text" name="first_name" placeholder="First Name">&nbsp;&nbsp;
            <input class="form-control" value="{{ $counselor->last_name }}" style=" width: 53%" type="text" name="last_name" placeholder="Last Name">
          </div>
          <br>
          <div class="form-inline">
            <input class="form-control" value="{{ $counselor->address }}" style=" width: 41%" type="text" name="address" placeholder="Address">
            <input class="form-control" value="{{ $counselor->city }}" style=" width: 25%" type="text" name="city" placeholder="City">
            <input class="form-control" value="{{ $counselor->state }}" style=" width: 16%" type="text" name="state" placeholder="State">
            <input class="form-control" value="{{ $counselor->zip }}" style=" width: 16%" type="text" name="zip" placeholder="Zip">
            <br>
          </div>
          <br>
          <input class="form-control" value="{{ $counselor->email }}" type="text" name="email" placeholder="Email"><br>
          <input class="form-control" value="{{ $counselor->primary_phone }}" type="text" name="primary_phone" placeholder="Primary Phone"><br>
          <input class="form-control" value="{{ $counselor->secondary_phone }}" type="text" name="secondary_phone" placeholder="Secondary Phone"><br>
          <input class="form-control" value="{{ $counselor->unit_num }}" type="text" name="unit_num" placeholder="Unit Number"><br>
          <input class="form-control" value="{{ $counselor->bsa_id }}" type="text" name="bsa_id" placeholder="BSA ID"><br>
          <button type="submit" class="btn btn-primary form-control" style=" width: 49%" name="submit">Submit</button>
          <button type="button" class="btn btn-danger form-control" style=" width: 49%" onClick="location='/home'" name="cancel">Cancel</button>
      </form>

      @if(count($errors))
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      @endif
    </div>
  </div>
@endsection
