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
              @foreach ($user->counselors as $counselor)
                <tr onClick="location='/counselors/{{ $counselor->id }}/show'">
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->name }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->unit_num }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->name }}</td>
                  <td class="mdl-data-table__cell--non-numeric">{{ $counselor->district->council->name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>


        </div>
        <div class="mdl-card__actions mdl-card--border">
          {{-- Buttons --}}


        </div>
      </div>
    </div>
  </div>
@endsection