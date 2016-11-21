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
    					@else
                <button onClick="location='/feedback'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  Submit some Feedback
                </button>
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
                <br>
                If you are a user trying to add a counselor:
                <ol>
                  <li>Visit <a href="/counselors/add">this page</a> to add a counselor. You can also click on the round blue button on the homepage</li>
                  <li>Fill out the short form</li>
                  <li>Your counselor will be added to the system. You can see them under <a href="/counselors/{{ \Auth::user()->id }}">Your Counselors</a></li>
                </ol>
              </p>
            </div>

            <div class="faq">
              <h4>I made an account, but I can't log in</h4>
              <p>
                After making an account, you will need to confirm your email. Check your email for a confirmation link. <br>
                If you have already confirmed your account, and still can't login, try reseting your password. If that doesn't work,
                send us an email at mbcdb.help@gmail.com
              </p>
            </div>

            <div class="faq">
              <h4>I accidentally entered wrong information when adding a counselor</h4>
              <p>
                That's ok. You can visit that counselor's page and click on the blue "Update Counselor" button.
              </p>
            </div>

            <div class="faq">
              <h4>Can i have multiple counselors under the same account?</h4>
              <p>
                Sure! In fact, we recommend using one account per troop, and having all counselors registered under that account.
              </p>
            </div>



            <div class="faq">
              <h4></h4>
            </div>

            <div class="faq">
              <h4>I have a question that isn't here</h4>
              <p>
                If you have any questions or comments, send an email to mbcdb.help@gmail.com <br>
                If you found a bug or glitch in the site, please <a href="/feedback">submit some feedback.</a> <br>
                We'll get it fixed a soon as possible.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
