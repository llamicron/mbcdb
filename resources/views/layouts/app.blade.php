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

    <style>

        body {
            font-family: 'Yantramanav';
            /*font-family: 'Lato';*/
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
          padding: 1rem;
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
          font-weight: 100;
          text-align: center;
          vertical-align: middle;
          font-size: 3em;
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

  <div class="row">
  	<div class="col-md-4 col-md-offset-4">
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
        <i><a target="_blank" href="https://laravel.com/">Made with Laravel&nbsp;</a></i>
      </div>
    </div>
</body>
</html>
