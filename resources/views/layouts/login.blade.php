<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')

    <!-- Styles -->
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    {{-- MDL --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.blue_grey-indigo.min.css" />
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <!-- Josefin Slab and Yantramanav -->
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,300,300italic,700,700italic|Yantramanav:400,100,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/confirmation.css" media="screen" title="no title" charset="utf-8">


    <style media="screen">
      .mdl-button--fab {
        position: fixed;
        right: 2em;
        bottom: 1em;
      }
      .counselor-card {
        width: 95%;
        margin-top: 2em;
        margin-left: 1em;
        margin-right: 1em;
      }
      .login-card {
        width: 100%;
        margin-top: 3em;
        padding: 2em;
        padding-left: 4em;
      }
      .mdl-textfield--floating-label input[type=password]:-webkit-autofill ~ label {
        transform: translate3d(0, -20px, 0);
        visibility: hidden;
      }

      .mdl-textfield--floating-label input[type=password]:-webkit-autofill ~ label:after {
        content: 'Password';
        visibility: visible;
        left: 0;
        transform: translate3d(0, -20px, 0);
        background: transparent;
        color: inherit;
      }
    </style>

</head>
<body id="app-layout">

{{-- Header and Nav --}}
<div class="mdl-layout mdl-js-layout">
<header class="mdl-layout__header mdl-layout__header--fixed">
  <img class="mdl-layout-icon"></img>
  <div class="mdl-layout__header-row">
    <span class="mdl-layout__title">@yield('header-title')</span>
    <div class="mdl-layout-spacer"></div>
    <nav class="mdl-navigation">
      @yield('header-nav')
    </nav>
    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
      <a href="#"><li class="mdl-menu__item">User</li></a>
    </ul>
  </div>
</header>
<div class="mdl-layout__drawer">
  <span class="mdl-layout__title">MBCDB</span>
  <nav class="mdl-navigation">
    @yield('tray-links')
  </nav>
</div>
<main class="mdl-layout__content">
    @yield('content')
</main>
</div>



<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>