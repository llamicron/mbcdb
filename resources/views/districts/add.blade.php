@extends('layout')

@section('head')
  <title>Add a District</title>
@endsection


@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

        <h2>Add a District: </h2>

          <form class="form-group" action="/counselors/{{ $counselor->id }}/districts/add" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {!! method_field('PATCH') !!}

                <select class="form-control" name="district">
                  @foreach ($districts as $district)

                    <option value="{{ $district->district_name }}">{{ $district->district_name }}</option>
                  @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary form-control" name="add_district">Add District</button>

          </form>


      </div>
    </div>
@endsection
