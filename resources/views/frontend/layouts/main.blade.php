<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <title>@yield('title')</title>
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">


  <!-- Modernizr JS -->
  <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
  <script src="{{ asset('frontend/js/respond.min.js"') }}"></script>
  </head>
  <body>
  <div class="box-wrap">
  @include('frontend.layouts.partials.header')
   <!-- start content -->
  @yield('content')
        <!-- end content -->
  @include('frontend.layouts.partials.footer')

<!-- jQuery -->
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <!-- jQuery Easing -->
  <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <!-- Owl carousel -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <!-- Waypoints -->
  <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
  <!-- Parallax Stellar -->
  <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>

  <!-- Main JS (Do not remove) -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>

  </div>
  </body>
</html>