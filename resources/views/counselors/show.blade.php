@extends('layouts.app')

@section('head')
  <title>{{ $counselor->name }}</title>
@endsection

@section('header-title')
  {{ $counselor->name }}
@endsection

@section('tray-links')
    <a class="mdl-navigation__link" href="/home">All Counselors</a>
    <a class="mdl-navigation__link" href="/counselors/add">Add a Counselor</a>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <br>

      <div class="demo-card-square counselor-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">{{ $counselor->name }}</h2>
        </div>

        <div class="mdl-card__supporting-text">
          <p>
          Email: <a href="mailto:{{ $counselor->email }}">{{ $counselor->email }}</a><br>
          Primary Phone: {{ $counselor->primary_phone }} <br>
          @if (isset($counselor->secondary_phone))
            Secondary Phone: {{ $counselor->secondary_phone }} <br>
          @endif
          Troop: {{ $counselor->unit_num }} <br>
          {{ $counselor->district->name }} District <br>
          <br>
          {{-- Chip --}}
          </p>
          @if ($counselor->unit_only == 1)
            <span class="mdl-chip mdl-chip--contact">
              <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">!</span>
              <span class="mdl-chip__text">
                {{ $counselor->name }} has chosen to only teach scouts in their troop. If you're not in Troop {{ $counselor->unit_num }}, please don't contact this counselor.
              </span>
            </span>
    			@endif
          {{-- End Chip --}}
        </div>

        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            button
          </a>
        </div>

      </div>

      <br>

      <div class="mdl-card-square mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Merit Badges</h2>
        </div>
        <div class="mdl-card__supporting-text">
          {{ $counselor->name }} teaches the following merit badges:
          <ul class="mdl-list">
            @foreach ($counselor->badges as $badge)
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  {{ $badge->name }}
                </span>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Button Text
          </a>
        </div>
      </div>

        {{-- <li class="list-group-item">
          <h3>{{ $counselor->name }}</h3><br>
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
              Unfavorite
            @else
              Favorite
            @endif
          </button>
          @if (Auth::user()->isAdmin || $counselor->isChildOf(Auth::user()))
						<button class="btn btn-primary double-button" onClick="location='/counselors/{{ $counselor->id }}/edit'"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Counselor</button>
						<button class="btn btn-danger double-button" onClick="location='#confirm'"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove Counselor</button>
          @endif
        </li> --}}



				{{-- Badge Area --}}
        {{-- <li class="list-group-item">
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
        </li> --}}

      <br>
      <br>
    </div>
  </div>
@endsection