@extends('layouts.app')

@section('head')
  <title>Search Results</title>
@endsection

@section('navbar-left')
    <li><a href="/home">All Counselors</a></li>
    <li><a href="/counselors/{{ Auth::user()->id }}">Your Counselors</a></li>
    <li><a href="/counselors/add">Add a Counselor</a></li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
              {{-- <HEADER> --}}
        <h2>
          <div class="pull-left">
            Search Results
          </div>
          <div class="pull-right">
            <button type="button" class="btn btn-primary" onClick="location='/counselors/add'" name="add_counselor">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;
              Add a Counselor
            </button>
          </div>
        </h2>

        <div class="text-center">
          <i>Click a column name to sort</i>
        </div>
              {{-- </HEADER> --}}


              {{-- <TABLE> --}}
        @if (is_null($results))
          <div class="text-center">
            <h2>
              {{ "Sorry, we couldn't find anything" }}
            </h2>
          </div>
        @else
        <table class="table table-striped">

          <thead>

            <tr>
              <th><a href="/home">Name</a></th>
              <th><a href="/sortByTroop">Troop</a></th>
              <th><a href="/sortByDistrict">District</a></th>
              <th><a href="#">Council</a></th>
              <th></th>
            </tr>

          </thead>
          <tbody>
	          @foreach($results as $result)
							@foreach($result as $counselor)
		            <tr>
		              <td>
		                <a href="/counselors/{{ $counselor->id }}/show">
		                  {{ $counselor->first_name }} {{ $counselor->last_name }}
		                </a>
		              </td>
		            	<td> {{ $counselor->unit_num }} </td>
		              <td> {{ $counselor->district->name }} </td>
		              <td> {{ $counselor->district->council->name }} </td>
		              <td>
		              	<div class="pull-right">
		                	<button type="button" class="btn btn-primary" onClick="location='/counselors/{{ $counselor->id }}/show'" name="view">
		                  	<span class="glyphicon glyphicon-zoom-in"></span>&nbsp;
		                  	View
		                	</button>
		              	</div>
		            	</td>
		          	</tr>
							@endforeach
						@endforeach
          </tbody>
        </table>
        @endif
    {{-- </TABLE> --}}
      </div>
    </div>
  </div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="text-center">
				<h3>Refine your search: </h3>
				<h4>
					<form class="" action="/search" method="post">
						{{ csrf_field() }}
						<label for="class">Search by: </label>
						<select class="form-control" name="class">
							<option value="App\Counselor">Counselors</option>
							<option value="App\Badge">Merit Badge</option>
							<option value="App\District">District</option>
							<option value="App\Council">Council</option>
							<option value="unit_num">Troop Number</option>
						</select>
						<br><br>
						<input type="text" class="form-control" name="search" value="" placeholder="Search Term"><br>
						<input class="btn btn-primary" type="submit" name="submit" value="Search">
					</form>
				</h4>
			</div>
		</div>
	</div>

@endsection
