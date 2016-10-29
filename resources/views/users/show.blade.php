@extends('layouts.app')

@section('head')
  <title>{{ $user->name}}</title>
@endsection

@section('header-title')
  {{ $user->name }}
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      {{-- User Card --}}
      <div class="mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">{{ $user->name }}</h2>
        </div>
        <div class="mdl-card__supporting-text">
          {{-- Content --}}
          <p>Email: {{ $user->email }}</p>
          <p>
            Role:
            @if ($user->isAdmin())
                Admin
            @else
              User
            @endif
          </p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          {{-- Buttons --}}
          {{-- Set Admin --}}
          <button onClick="location='/users/{{ $user->id }}/setAdmin'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Make Administrator
          </button>

          {{-- Delete --}}
          <button class="mdl-button show-delete-modal mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
            Delete
          </button>

          <dialog class="mdl-dialog delete-dialog">
            <div class="mdl-dialog__content">
              <p>
                Are you sure?
              </p>
            </div>
            <div class="mdl-dialog__actions">
              <button onClick="location='/users/{{ $user->id }}/delete'" type="button" class="mdl-button">Delete this User</button>
              <button type="button" class="mdl-button close">Go Back</button>
            </div>
          </dialog>
          <script>
            var dialog = document.querySelector('.delete-dialog');
            var showModalButton = document.querySelector('.show-delete-modal');
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
        </div>
      </div>

      {{-- User's Counselors Card --}}
      <div class="mdl-card counselor-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">{{ $user->name }}'s counselors</h2>
        </div>
        <div class="mdl-card__supporting-text table-card">
          <ul class="mdl-list">
            @foreach ($user->counselors as $counselor)
              <a href="/counselors/{{ $counselor->id }}/show"><li id="user_counselors_li" class="mdl-list__item">{{ $counselor->name }}</li></a>
            @endforeach
          </ul>

        </div>
      </div>
    </div>
  </div>
@endsection