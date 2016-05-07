@extends('layout')
{{-- THIS IS A TEMPORARY page to add merit badges to the DB.  it will be deleted in production. --}}
@section('head')
  <title>Add Badges</title>
@endsection


@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">

    <h2>Add a Badge</h2>

    <form class="form-group" action="/badges/addBadge" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <input type="text" class="form-control" name="code" placeholder="Badge ID" value=""><br>
      <input type="text" class="form-control" name="name" placeholder="Badge Name" value=""><br>
      <input type="submit" class="btn btn-primary form-control" name="submit" value="Add Badge">

    </form>
    <div class="text-center">
      <i>This is a tool for the devs to add merit badges behind the scenes.  If you are on this page (and you won't be) please disregard and consider clicking <a href="/counselors">this link.</a></i>
    </div>
  </div>
</div>
@endsection
