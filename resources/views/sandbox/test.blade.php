@extends('layouts.app')

@section('head')
  <title>Test</title>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
        {{ Auth::user() }}
    </div>
  </div>
@endsection
