@extends('layout')

@section('head')
  <title>Merit Badges</title>
@endsection


@section('content')
  <div class="row">

    <div class="col-md-6 col-md-offset-3">
      <h2>All Merit Badges</h2>
      <ul class="list-group">
        @foreach($badges as $badge)
          <li class="list-group-item">{{ $badge->code }}: {{ $badge->name }}</li><br>
        @endforeach

      </ul>
    </div>

  </div>
@endsection
