@extends('layouts.app')

@section('head')
  <title>{{ $counselor->name }}</title>
@endsection

@section('header-title')
  {{ $counselor->name }}
@endsection

@section('tray-links')

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <br>

      {{-- Counselor Card --}}
      <div class="mdl-card mdl-shadow--4dp">
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
          {{ $yptMessage }} <br>
          {{ $counselor->district->name }} District <br>
          <br>
          </p>
          {{-- Chip --}}
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

        {{-- Counselor Buttons --}}
        <div class="mdl-card__actions mdl-card--border">
          {{-- Favorite Button --}}
          @if (Auth::user()->hasSaved($counselor))
            <button id="unfavorite" onClick="location='/counselors/{{ $counselor->id }}/saveToUser'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
              <i class="material-icons">favorite</i>
            </button>
            <div class="mdl-tooltip mdl-tooltip--large" for="unfavorite">
              Unfavorite this counselor
            </div>
          @else
            <button id="favorite" onClick="location='/counselors/{{ $counselor->id }}/saveToUser'" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">favorite_border</i>
            </button>
            <div class="mdl-tooltip mdl-tooltip--large" for="favorite">
              Favorite this counselor
            </div>
          @endif

          @if (Auth::user()->isAdminOrOwner($counselor))
            <button onClick="location='/counselors/{{ $counselor->id }}/edit'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              <span class="glyphicon glyphicon-edit"></span>&nbsp;
              Update Counselor
            </button>

            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent show-modal">
              <span class="glyphicon glyphicon-trash"></span>&nbsp;
              Remove Counselor
            </button>



          @endif
        </div>

      </div>

      <br>
      <br>

      {{-- Badges Card --}}
      <div class="mdl-card-square mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">Merit Badges</h2>
        </div>
        <div class="mdl-card__supporting-text">
            @if ($counselor->badges->isEmpty())
              <span class="mdl-list__item-primary-content">This counselor doesn't teach any badges</span>
              <br><br>
              @if (Auth::user()->isAdminOrOwner($counselor))
                <div class="mdl-card__actions mdl-card--border">
                  <button onClick="location='/counselors/{{ $counselor->id }}/badges/add'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <i class="material-icons">playlist_add</i>
                    Add Badges
                  </button>
                </div>
              @endif
            @else
              {{ $counselor->name }} teaches the following merit badges:
              <ul>
                @foreach ($counselor->badges as $badge)
                  <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                      {{ $badge->name }}
                    </span>
                  </li>
                @endforeach
                {{-- Probably the most ghetto thing i have ever done --}}
                {{-- Can't figure out another fix becasue im retarded --}}
                <br><br><br><br><br>
                {{-- KMS --}}
              </ul>
              @if (Auth::user()->isAdminOrOwner($counselor))
                <button onClick="location='/counselors/{{ $counselor->id }}/badges/edit'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  <span class="glyphicon glyphicon-trash"></span>&nbsp;
                  Remove Badges
                </button>
                <button onClick="location='/counselors/{{ $counselor->id }}/badges/add'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  <i class="material-icons">playlist_add</i>
                  Add Badges
                </button>
              @endif
            @endif
        </div>

      </div>
      <br>
      <br>
      <button onClick="location='/counselors/add'" id="add_counselor_fab" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--colored">
        <i class="material-icons">add</i>
      </button>
    </div>
  </div>
  <dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
      <p>
        This counselor will be deleted and cannot be restored. Are you Sure?
      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button onClick="location='/counselors/{{ $counselor->id }}/remove'" type="button" class="mdl-button">Yes, I'm Sure</button>
      <button type="button" class="mdl-button close">Go Back</button>
    </div>
  </dialog>
  <script>
    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>
@endsection
