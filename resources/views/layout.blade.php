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
// Thank yuo for your patience.  I will update this if i add a new yield(), unless I forget.
// Oh wait...
// TODO: Add comment to the layout file when you add a new yield()
--}}

<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      @yield('head')
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">MBCDB</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="/counselors">Home</a></li>
              @yield('navbar-left')
            </ul>
              <ul class="nav navbar-nav" style="float: right">
                @yield('navbar-right')
              <li><a href="#logout" class="navbar-nav pull-right">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      <br>
      <br>
    </head>
    <body>



      @yield('content')
    </body>
</html>
