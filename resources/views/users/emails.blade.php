@extends('layouts.app')

@section('head')
  <title>All Users Emails</title>
@endsection

@section('header-title')
  All Users Emails
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">

      <div class="mdl-card mdl-shadow--4dp">
        <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text">All Users Emails (CSV)</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <div class="mdl-textfield mdl-js-textfield">
            <textarea autofocus="autofocus" class="mdl-textfield__input" type="text" rows="20" id="emails">
              @php
                foreach ($users as $user) {
                  echo "{$user->email}, ";
                }
              @endphp
            </textarea>
          </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <i>Hint: Press ctrl+a (or cmd+a) and then ctrl+c (or cmd+c) to copy all the emails. </i>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection