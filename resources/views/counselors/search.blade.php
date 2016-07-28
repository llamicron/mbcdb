@extends('layouts.app')

@section('head')
  <title>Search</title>
@endsection

@section('navbar-left')

@endsection

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <form action="/search" method="post">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="search" value=""><hr>
        <input type="submit" class="form-control btn btn-primary" name="submit" value="Search">
      </form>
      
    </div>
  </div>
@endsection
