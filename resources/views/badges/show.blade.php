@extends('layout')

@section('head')
  <title>{{ $badge->name }} Merit Badge</title>
@endsection

<?php
  $requirements = unserialize($badge->requirements);
?>

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <h1>{{ $badge->name }} Merit Badge</h1>

      <ul class="list-group">
        <li class="list-group-item">
          {{ $badge->description }}
        </li>
        <hr>
        <h1>Requirements</h1>
        <ol>
          @foreach($requirements as $requirement)
            <li>{{ $requirement }}</li>
          @endforeach
        </ol>
      </ul>

    </div>
  </div>
@endsection
