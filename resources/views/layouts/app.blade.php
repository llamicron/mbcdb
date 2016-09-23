<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <!-- Josefin Slab and Yantramanav -->
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,300,300italic,700,700italic|Yantramanav:400,100,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/confirmation.css" media="screen" title="no title" charset="utf-8">
    <style>

        body {
            /*font-family: 'Yantramanav';*/
            font-family: 'Lato';
        }

        .font {
          font-size: 1.1em;
        }

        html, body {height: 100%; overflow-x: hidden;}

        #wrap {}

        #main {
        	 padding-bottom: 150px;
          }  /* must be same height as the footer */

        #footer {
          position: absolute;
          right: 0;
          bottom: 0;
          left: 0;
          padding: 0.5rem;
          background-color: #efefef;
        }

        /*Opera Fix*/
        body:before {
        	content:"";
        	height:100%;
        	float:left;
        	width:0;
        	margin-top:-32767px;/
        }


        .fa-btn {
            margin-right: 6px;
        }

        .message-page {
          font-family: 'Lato';
          font-weight: 300;
          text-align: center;
          vertical-align: middle;
          font-size: 2em;
        }

        p.about {
          font-size: 18px;

        }

        .alert-success {
          font-family: 'Lato';
          font-weight: 300;
        }

        table {
          table-layout:fixed;
        }

        th.narrow {
					width: 10%;
        }

				input.quarter {
					width: inherit;
					float: left;
					margin-right: 0em;
					margin-bottom: 0em;
				}

				.nopadding {
			    padding: 0.1em !important;
					margin-bottom: 0.3em;
				}

				.double-button {
					margin-bottom: 0.5em;
					margin-top: 1em;
				}

				.truncate {
				  width: 250px;
				  white-space: nowrap;
				  overflow: hidden;
				  text-overflow: ellipsis;
				}

				#user-search {
					float: right;
					width: 50%;
					margin-top: 2em;
				}

				#bulk-checkbox {

				}

        .overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          padding-top: 15em;
          /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+67 */
          background: -moz-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 67%, rgba(0,0,0,0) 100%); /* FF3.6-15 */
          background: -webkit-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 67%,rgba(0,0,0,0) 100%); /* Chrome10-25,Safari5.1-6 */
          background: radial-gradient(ellipse at center,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 67%,rgba(0,0,0,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

          transition: opacity 500ms;
          visibility: hidden;
          display: hidden;
          opacity: 0;
        }
        .overlay:target {
          visibility: visible;
          opacity: 1;
        }

        .popup {
          margin: 70px auto;
          padding: 20px;
          background: #fff;
          border-radius: 5px;
          width: 30%;
          position: relative;
          transition: all 5s ease-in-out;
        }

        .popup .close {
          position: absolute;
          top: 30px;
          right: 30px;
          transition: all 200ms;
          font-size: 30px;
          font-weight: bold;
          text-decoration: none;
          color: #000;
        }
        .popup .close:hover {
          color: #5bc0de;
        }
        .popup .content {
          max-height: 30%;
          overflow: auto;
        }

        .popup h2 {
          padding: 0.2em;
          margin-top: 0;
          color: 	#d9534f;
          font-family: Lato, Arial, sans-serif;
        }

        #popup-confirm {
          width: 100%;
        }

        @media screen and (max-width: 700px){
          .box{
            width: 70%;
          }
          .popup{
            width: 70%;
          }
        }

    </style>
</head>
<body id="app-layout">


  {{-- NAVBAR --}}
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/home') }}">
          <span class="glyphicon glyphicon-home"></span>&nbsp;
          MBC
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          {{-- Navbar Left yield --}}
          @yield('navbar-left')
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          {{-- Navbar Right yield --}}
          @yield('navbar-right')

          <li><a href="/about">About</a></li>
					<form class="navbar-form navbar-right" role="search" action="/search" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" class="form-control" name="search" placeholder="Search Merit Badges">
						</div>
						{{-- <input type="hidden" name="class" value=""> --}}
					</form>
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								@if (Auth::user()->isAdmin == 1)
									<span class="glyphicon glyphicon-star"></span>
									{{ Auth::user()->name }} <span class="caret"></span>
								@else
                	{{ Auth::user()->name }} <span class="caret"></span>
								@endif
              </a>

              <ul class="dropdown-menu" role="menu">
								<li><a href="/searchStub"><i class="fa fa-btn fa-search"></i>Advanced Search</a></li>
								@if (Auth::user()->isAdmin == 1)
									<li><a href="/admin"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Admin Panel</a></li>
								@endif
								<li><a href="/users/self/edit"><i class="fa fa-btn fa-cog"></i>Edit Account</a></li>
								<li><a href="/feedback"><i class="fa fa-btn fa-send"></i>Send Feedback</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  {{-- END NAVBAR --}}



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<div id="wrap">
  <div id="main" class="container">
    <div class="font">
			<!-- Echoing flashed status -->
			@if(Session::has('status'))
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ Session::get('status') }}
				</div>
			@endif

      @yield('content')

  <div id="confirm" class="overlay">
    <div class="popup">
      <h2>Are you sure?</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">
        <a href="@yield('confirm-link')">
          <button type="button" id="popup-confirm" class="btn btn-primary" name="confirm"><strong>Yes, I'm Sure</strong>&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
        </a>
      </div>
    </div>
  </div>

  <div id="feedback" class="overlay">

  </div>


  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
  		@if($errors->has())
  			<hr>
  			@foreach ($errors->all() as $error)
  				<div class="alert alert-danger"><li>{{ $error }}</li></div>
  			@endforeach
  		@endif
  	</div>
  </div>
  		</div>
    </div>
  </div>
	<div id="footer">
		<a href="/feedback">&nbsp;Send Feedback</a>
		<div class="pull-right">
			<a target="_blank" href="http://www.samhoustonbsa.org/">Sam Houston Area Council</a>
		</div>
	</div>
</body>
</html>
