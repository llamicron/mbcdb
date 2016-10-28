@extends('layouts.app')

@section('head')
  <title>Search Results</title>
@endsection

@section('header-title')
  Search Results
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset">
    <div class="container">
			@if (!is_null($results))
        {{-- New Table --}}
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric">Name</th>
              <th class="mdl-data-table__cell--non-numeric">Troop</th>
              <th class="mdl-data-table__cell--non-numeric">District</th>
              <th class="mdl-data-table__cell--non-numeric">Council</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($results as $result)
              @foreach ($result as $counselor)
                <tr onClick="location='/counselors/{{ $counselor->id }}/show'">
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->name }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->unit_num }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->name }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->council->name }}</td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
        @else
          <div class="status">
            <span class="mdl-chip">
              <span class="mdl-chip__text">No Results</span>
            </span>
          </div>
        @endif
      </div>
    </div>
  </div>
  <hr>
  {{-- Advanced Search --}}
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

      <div class="mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Advanced Search</h2>
        </div>
        <div class="mdl-card__supporting-text">
          {{-- Content --}}
          <form action="/search" method="post">
            {{ csrf_field() }}
            <label for="class">Search by: </label>
						<select class="form-control" name="class">
							<option value="App\Counselor">Counselors</option>
							<option value="App\Badge">Merit Badge</option>
							<option value="App\District">District</option>
							<option value="App\Council">Council</option>
							<option value="unit_num">Troop Number</option>
						</select>
            <br>
            &nbsp;
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              {{-- Sets default value so user can't search for nothing --}}
              <input type="hidden" name="search" value="default">
              <input class="mdl-textfield__input" name="search" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Search</label>
            </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          {{-- Buttons --}}
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Search
          </button>
        </div>
      </form>
      </div>

			{{-- <div class="text-center">
				<h3>Advanced search: </h3>
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
			</div> --}}
		</div>
	</div>

@endsection
