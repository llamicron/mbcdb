@extends('layouts.app')

@section('header-title')
  Stub for Testing
@endsection

@section('tray-links')

@endsection

@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <form action="http://www.github.com/SelectiveAlso/mbcdb/issues" method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" name="title" type="text" id="title">
          <label class="mdl-textfield__label" for="title">Title</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" name="body" type="text" id="body">
          <label class="mdl-textfield__label" for="body">Body</label>
        </div>

        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
          Submit
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
