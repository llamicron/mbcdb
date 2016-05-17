@extends('layouts.app')

@section('head')
<title>Add a Merit Badge</title>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2>Which Merit Badges Does {{ $counselor->first_name . " " . $counselor->last_name }} Teach?</h2>

        <form class="form-group" action="/counselors/{{ $counselor->id }}/badges/add" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <select class="form-control" style=" width: 99%" name="merit_badge">
              @foreach($merit_badge_list as $merit_badge)
                <option value="{{ $merit_badge->id }}">{{ $merit_badge->name }}</option>
              @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-primary form-control" style=" width: 50%; " name="submit" value="Add">
            <input type="button" class="btn btn-danger form-control" style=" width: 49%; " name="cancel" value="Cancel" onClick="location='/counselors{{ $counselor->id }}/show'"><br><br>
            <input type="button" class="btn btn-primary form-control" style=" width: 100%; " name="done" value="Done" onClick="location='/counselors/{{ $counselor->id }}/show'"><br>


        </form>
    </div>
  </div>
@endsection
