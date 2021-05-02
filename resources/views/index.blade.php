<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Lending Edge loans for nigeria">
    <meta name="keywords" content="lending edge, loans">

    <title>{{ config('app.name') }}</title>

    <link rel="shortcut icon" type="favicon" href="{{ secure_asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ secure_asset('js/plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Icofont Css -->
    <link rel="stylesheet" href="{{ secure_asset('js/plugins/fontawesome/css/all.css') }}">
    <!-- animate.css -->
    {{-- <link rel="stylesheet" href="{{ secure_asset('js/plugins/animate-css/animate.css') }}"> --}}
    <!-- Icofont -->
    <link rel="stylesheet" href="{{ secure_asset('js/plugins/icofont/icofont.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
  </head>
  <body  data-spy="scroll" data-target=".fixed-top">
    
    <div id="app">
      <nprogress-container></nprogress-container>
      <router-view></router-view>
    </div>

    {{-- Javascript --}}
    <script src="{{ secure_asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ secure_asset('js/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('js/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Woow animtaion -->
    <script src="{{ secure_asset('js/plugins/counterup/wow.min.js') }}"></script>
    <script src="{{ secure_asset('js/plugins/counterup/jquery.easing.1.3.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ secure_asset('js/plugins/counterup/jquery.waypoints.js') }}"></script>
    <script src="{{ secure_asset('js/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    {{-- <script src="{{ secure_asset('js/plugins/google-map/gmap3.min.js') }}"></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script> --}}
    <!-- Contact Form -->
    {{-- <script src="{{ secure_asset('js/plugins/jquery/contact.js') }}"></script> --}}
    <script src="{{ secure_asset('js/custom.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
  </body>
</html>
