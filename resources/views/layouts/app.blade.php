<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="{{ asset('img/logo_usb_small.png')}}" type="image/x-icon">
      <title>SISTEMA BASE</title>
      @if (config('app.env') == 'local')
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      @else
      <link rel="stylesheet" href="{{asset(mix('css/app.css'), true)}}">
      @endif   
    </head>
    <body class="sidebar-mini sidebar-collapse">
        <div class="wrapper" id="app">

          @include('layouts.partials.navbar')

          @include('layouts.partials.sidebar')
          
          @yield('content')

          @include('layouts.partials.control-sidebar')

          @include('layouts.partials.footer')

        </div>
        
        @if (config('app.env') == 'local')
        <script src="{{asset('js/app.js')}}"></script>
        @else
        <script src="{{asset(mix('js/app.js'), true)}}"></script>
        @endif  
        @stack('scripts')
    </body>
</html>
