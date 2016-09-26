@extends('layouts.app')

@section('head')
  <title>All Counselors</title>
@endsection

@section('navbar-left')
    <li><a href="/home">All Counselors</a></li>
    <li><a href="/counselors/add">Add a Counselor</a></li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <br>
			{{-- Counselor Area --}}
      <ul class="list-group">
        <li class="list-group-item">
          <h3>{{ $counselor->first_name }} {{ $counselor->last_name }}</h3><br>
					Email: <a href="mailto:{{ $counselor->email }}">{{ $counselor->email }}</a><br>
          Primary Phone: {{ $counselor->primary_phone }}<br>
          @if(isset($counselor->secondary))
            Secondary Phone: {{ $counselor->secondary_phone }}<br>
          @endif
          <br>
          Troop {{ $counselor->unit_num }}<br>
          {{ $counselor->district->name }} District<br>
					Unit Only:
					@if ($counselor->unit_only)
						{{ 'Yes' }}
					@else
						{{ 'No' }}
					@endif
          <br><br>
          <button class="btn btn-primary double-button" onClick="location='/counselors/{{ $counselor->id }}/saveToUser'"><span class="glyphicon glyphicon-heart-empty"></span>&nbsp;
            @if (Auth::user()->hasSaved($counselor))
              Remove
            @else
              Save
            @endif
          </button>
          @if (Auth::user()->isAdmin || $counselor->isChildOf(Auth::user()))
						<button class="btn btn-primary double-button" onClick="location='/counselors/{{ $counselor->id }}/edit'"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Counselor</button>
						<button class="btn btn-danger double-button" onClick="location='#confirm'"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove Counselor</button>
          @endif
        </li>
				{{-- Badge Area --}}
        <li class="list-group-item">
            <h3>Badges This Counselor Teaches:</h3>

            <ul>
							@if ($counselor->badges->isEmpty())
								<li><i>This counselor doesn't teach any merit badges</i></li>
							@else
	              @foreach($counselor->badges as $badge)
	                <li>
	                  {{ $badge->name }}
	                </li>
	              @endforeach
              @endif
            </ul>
            <br>
            @if($counselor->isChildOf(Auth::user()) || Auth::user()->isAdmin)
              <button class="btn btn-primary double-button" onClick="location='/counselors/{{ $counselor->id }}/badges/add'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add A Badge</button>
              <button class="btn btn-danger double-button" onClick="location='#confirm2'"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove a Badge</button>
            @endif
        </li>
        <br>
      </ul>

			@if ($counselor->unit_only == 1)
				<div class="alert alert-info">
					<p>
						This counselor has chosen to only teach scouts in their troop.  <br> If you are not in Troop {{ $counselor->unit_num }}, please do not contact this counselor.
					</p>
				</div>
			@endif

    </div>
  </div>
@endsection

@section('confirm-title')
  Are You Sure?
@endsection

@section('confirm-content')
  <div class="alert alert-danger">
    <div class="text-center">
      <strong>This counselor will be deleted and cannot be restored.  Are you sure?</strong><br>
    </div>
    <button type="button" class="btn btn-primary confirm-button" onClick="location='/counselors/{{ $counselor->id }}/remove'" name="confirm">Yes, I'm Sure</button>
  </div>
@endsection

@section('confirm2-title')
  Remove Badges
@endsection

@section('confirm2-content')
	<h3>Select Badges to Remove</h3>
	<hr>
	<form action="/counselors/{{ $counselor->id }}/badges/remove" method="post">
		{{ csrf_field() }}
		@foreach ($counselor->badges as $badge)
			<li>
				<input type="checkbox" name="{{ $badge->name }}" value="{{ $badge->id }}">&nbsp;
				{{ $badge->name }}
			</li>
		@endforeach
		<hr>
		<button class="btn btn-primary double-button" type="submit" name="submit">Submit</button>
		<button type="button" class="btn btn-danger double-button" onClick="location='/counselors/{{ $counselor->id }}/show'" name="cancel">Cancel</button>
	</form>
@endsection
