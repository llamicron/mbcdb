@extends('layouts.app')

@section('head')
<title>Add a Merit Badge</title>
@endsection

@section('content')
  <div class="row">
    {{-- <div class="col-md-8 col-md-offset-2"> --}}
      <h2>Which Merit Badges Does {{ $counselor->first_name . " " . $counselor->last_name }} Teach?</h2>

        <form class="form-group" action="/counselors/{{ $counselor->id }}/badges/add" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          @foreach ($chunks as $badges)
            {{-- <div class="row"> --}}
              <div class="col-md-4 badges">
                @foreach($badges as $badge)
                  <div class="checkbox">
                    <label><input type="checkbox" id="badges" name="{{ $badge->name }}" value="{{ $badge->id }}">{{ $badge->name }}</label>
                  </div>
                @endforeach
                <hr>
              </div>
            {{-- </div> --}}
          @endforeach


            <input type="submit" class="btn btn-primary double-button" name="submit" value="Add Badges">
            <input type="button" class="btn btn-danger double-button" name="cancel" value="Cancel" onClick="location='/counselors{{ $counselor->id }}/show'"><br><br>


        </form>
    {{-- </div> --}}
  </div>
@endsection
