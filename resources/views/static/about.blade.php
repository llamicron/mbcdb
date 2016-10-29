@extends('layouts.app')

@section('head')
  <title>About</title>
@endsection

@section('navbar-left')
  <li><a href="/home">All Counselors</a></li>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">MBCDB: Merit Badge Counselor Database</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <p class="about">
              MBCDB is an application used to record merit badge counselors in the Sam Houston Area Council. Keeping a record of merit badge couselors will help scouts find
    					the appropriate counselor in their area, and with troop record keeping. Take a look at the frequently asked questions below.
              <hr>
    					@if (Auth::guest())
    						To get started, <a href="/register">register</a> or <a href="/login">login</a>
    					@endif
            </p>

          </div>
        </div>
        <br>
        <div class="mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">FAQ</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <div id="how-to-use" class="faq">
              <h4>How do I use this website?</h4>
              <p>
                If you are a scout looking for a counselor:
                <ol>
                  <li>Enter your troop number into the search field in the navigation tray</li>
                  <li>Use the provided field to narrow down your search by merit badge</li>
                  <li>You can also use the advanced search to search by counselor name, district, troop number, etc.</li>
                </ol>


              </p>
            </div>
            <div id="how-to-use" class="faq">
              <h4>Can i have multiple counselors under the same account?</h4>
              <p>
                Sure! In fact, we recommend using one account per troop, and having all counselors registered under that account.
              </p>
            </div>


          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
