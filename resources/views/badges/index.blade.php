@extends('layout')

@section('head')
  <title>Merit Badges</title>
@endsection


@section('content')
  <div class="row">

    <div class="col-md-6 col-md-offset-3">
      <h2>Merit Badges</h2>
      <ul class="list-group">
        @foreach($badges as $badge)
          <li class="list-group-item"><a href="/badges/{{ $badge->id }}">{{ $badge->name }}</a></li><br>
        @endforeach

      </ul>
    </div>

  </div>
@endsection
