<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <title>@yield('mytitle')</title>
    <link rel="shortcut icon" href="{{ asset('uploads/images/config/'.$dataConfig->icon) }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="./frontend/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="./frontend/css/owl.theme.default.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./frontend/css/style.css">
    <link rel="stylesheet" href="./admin/animate.css">
    <style type="text/css" media="screen">
      .product_list .ul.d-none .item .p-sale {
        background: #fff;
        color: #ed1c24;
        font-size: 12px;
        position: absolute;
        right: 2px;
        top: 0px;
        z-index: 100;
        font-style: normal;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        width: 40px;
        height: 40px;
        border: 1px solid #ed1d24;
        border-radius: 50%;
    }
    .product-home .item .add-to-cart {
        position: absolute;
        left: 30px;
        right: 30px;
        background-color: #5a240a;
        color: #fff;
        text-align: center;
        line-height: 20px;
        border-radius: 20px;
        padding: 10px;
        display: block;
        margin-top: 63px;
        z-index: 100;
    }
    .product-home .item .add-to-cart:hover{
      cursor: pointer;
    }
    .product-home .item .add-to-cart a{
      color: #fff;
    }
    .product-list .item .add-to-cart a{
      color: #fff;
    }
    .product-list .item .add-to-cart:hover{
      cursor: pointer;
    }
    .product-list .item .add-to-cart {
        position: absolute;
        left: 30px;
        right: 30px;
        background-color: #5a240a;
        color: #fff;
        text-align: center;
        line-height: 20px;
        border-radius: 20px;
        padding: 10px;
        display: block;
        margin-top: 63px;
        z-index: 100;
    }
     .product_list .ul.d-none .item .add-to-cart {
        position: absolute;
        left: 30px;
        right: 30px;
        background-color: #5a240a;
        color: #fff;
        text-align: center;
        line-height: 20px;
        border-radius: 20px;
        padding: 10px;
        display: block;
        margin-top: 63px;
        z-index: 100;
    }
    .product_list .ul.d-none .item .add-to-cart:hover{
      cursor: pointer;
    }
    .product_list .ul.d-none .item .add-to-cart a{
      color: #fff;
    }
    </style>
    <script src="./frontend/js/jquery.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js" type="text/javascript" ></script>
    <script src="./admin/jquery.validate.min.js"></script>
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

