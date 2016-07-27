<!DOCTYPE html>
{{--
// I feel like i should add how to use my layout file.  not sure if this is standard or not.
// The current yields() are:
//
//
//    * Head         - self explainatory.  If you need anything in the <head> tags, put it in this yield
//
//    * Content      - self explainatory again.  Contains al content in the <body> tags
//
//    * navbar-left  - If you want an item in the navbar, put it in this yield or the following.  This will align
//                     the item to the left, on the right side of the 'MBCDB' and 'Home' items.
//
//    * navbar-right - Does the same as above, but will align to the right.  It will place the items on the left side
//                     of the 'Logout' item.
//
// Thank you for your patience.  I will update this if i add a new yield(), unless I forget.
//
// Add comment to the layout file when you add a new yield()
//
// P.S. I had made a custom layout file before i learned about auth.  This is the built in Auth layout file that i have
// edited to fit with all of my views.  The above comments should still apply, but use with caution.
//
--}}

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

        html, body {height: 100%;}

        #wrap {min-height: 100%;}

        #main {overflow:auto;
        	padding-bottom: 150px;}  /* must be same height as the footer */

        #footer {position: relative;
        	margin-top: -15px; /* negative value of footer height */
        	height: 15px;
        	clear:both;}

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

        .table {
          table-layout:fixed;
        }

        .table td {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
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
          MBCDB
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
          <li style="padding-top: 0.5em">
            <form class="" action="/search" method="post">
              {{ csrf_field() }}
              <input type="text" name="search" class="form-control" value="" placeholder="Search">&nbsp;
            </form>
          </li>
          <li><a href="/about">About</a></li>
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
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
  <div id="main">
    <div class="font">
      @yield('content')
    </div>

    <!-- Echoing flashed status -->
    @if(Session::has('status'))
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ Session::get('status') }}</strong>
          </div>
        </div>
      </div>
    @endif

  </div>
</div>
    <div id="footer">
      &nbsp;MBCDB | Luke Sweeney | 2016
      <div class="pull-right">
        <i><a href="https://laravel.com/">Made with Laravel&nbsp;</a></i>
      </div>
    </div>
</body>
</html>
