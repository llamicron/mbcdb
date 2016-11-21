@extends('layouts.app')

@section('head')
  <title>Send Feedback</title>
@endsection

@section('header-title')
  Send Feedback
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="/feedback" method="post">
        {{ csrf_field() }}
        <div class="mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Send Feedback</h2>
          </div>
          <div class="mdl-card__supporting-text">
            {{-- Content --}}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" value="" name="title" type="text" id="title">
              <label class="mdl-textfield__label" for="title">Subject</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
              <textarea class="mdl-textfield__input" name="body" type="text" rows="8" id="body"></textarea>
              <label class="mdl-textfield__label" for="body">Message...</label>
            </div>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            {{-- Buttons --}}
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Submit
            </button>
            <button type="button" onClick="location='/'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
              Cancel
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection