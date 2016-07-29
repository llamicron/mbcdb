@extends('layouts.app')

@section('head')
  <title>Test</title>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">

      <?php $counselor = App\Counselor::first(); ?>
      @if (Auth::user()->isAdmin || $counselor->isChildOf(Auth::user()))
        <button class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/edit'"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Counselor</button>
        <button class="btn btn-danger" onClick="location='/counselors/{{ $counselor->id }}/confirmRemoval'">Remove Counselor</button>
      @endif
    </div>
  </div>
@endsection
