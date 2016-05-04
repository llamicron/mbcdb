@extends('layout')

@section('head')
<title>Add a Merit Badge</title>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Add a Merit Badge to {{ $counselor->first_name . " " . $counselor->last_name }}</h1>

        <form class="form-group" action="/badges/{{ $counselor->id }}/add" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <select class="form-control" name="merit_badge">
              @foreach($merit_badge_list as $merit_badge)
                <option value="{{ $merit_badge->id }}">{{ $merit_badge->name }}</option>
              @endforeach
            </select>

            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            <input type="button" class="btn btn-danger float-right" name="cancel" value="Cancel" onClick="location='/counselors'">

        </form>
    </div>
  </div>
@endsection
