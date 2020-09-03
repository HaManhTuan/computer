<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <title></title>
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/template/default/images/favicon.png" />
    <link href="./frontend/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="./frontend/css/owl.theme.default.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./frontend/css/style.css">
  </head>
  <body>
    <div id="wrap">
    <div id="top">
      @include('layout.home.header') 
      </div>
        <div class="container">
          @yield('content')
        </div>
        <!--container_footer-->
         @include('layout.home.footer')
        <!--container_footer-->
  </body>
</html>
<!-- Load time: 0.167 seconds  / 7.75 mb-->
<!-- Powered by HuraStore 7.4.4, Released: 12-Aug-2018 / Website: www.hurasoft.vn -->

