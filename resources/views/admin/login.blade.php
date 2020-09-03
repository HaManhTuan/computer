<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>ComputerApp - Admin Dashboard </title>
  <base href="{{ asset('') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Site favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./admin/vendors/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./admin/vendors/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./admin/vendors/images/favicon-16x16.png">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="./admin/vendors/styles/core.css">
  <link rel="stylesheet" type="text/css" href="./admin/vendors/styles/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="./admin/vendors/styles/style.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
</head>
<body class="login-page">
  <div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="brand-logo">
        <a href="login.html">
          <img src="./admin/vendors/images/deskapp-logo.svg" alt="">
        </a>
      </div>
    </div>
  </div>
  <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-7">
          <img src="./admin/vendors/images/login-page-img.png" alt="">
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
              <h2 class="text-center text-primary">Đăng nhập để Quản trị</h2>
            </div>
            <form action="{{ url('admin/dang-nhap') }}" method="POST" onsubmit="return false;" id="frm-login">
              @csrf
              <div class="input-group custom" style="margin-bottom: 30px;">
                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" id="email" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
                <div class="input-group-append custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
              </div>
              <div class="input-group custom" style="margin-bottom: 30px;">
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" id="password" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu.">
                <div class="input-group-append custom">
                  <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">Đăng nhập</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    #email-error{
      position: absolute;
      bottom: -35px;
      left: 10px;
      color: red;
      font-size: 14px;
    }
     #password-error{
      position: absolute;
      bottom: -35px;
      left: 10px;
      color: red;
      font-size: 14px;
    }
  </style>
  <!-- js -->
  <script src="./admin/vendors/scripts/core.js"></script>
  <script src="./admin/jquery.validate.min.js"></script>
  <script src="./admin/notify.js"></script>
  <script src="./admin/vendors/scripts/script.min.js"></script>
  <script src="./admin/vendors/scripts/process.js"></script>
  <script src="./admin/vendors/scripts/layout-settings.js"></script>
  <script>
    $(document).ready(function() {
      $("#btn-login").click(function() {
              $("#frm-login").validate({
                  submitHandler: function() {
                      let action = $("#frm-login").attr('action');
                      let method = $("#frm-login").attr('method');
                      let formData = $("#frm-login").serialize();
                      $.ajax({
                          url: action,
                          type: method,
                          data: formData,
                          dataType: 'JSON',
                          headers: {
                              'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                          },
                          success: function(data) {
                              //console.log(data);
                              if (data.status == '_success') {
                                 
                                  window.location.href='{{ url('admin/dashboard') }}';
                              }
                              else{
                                  $("#btn-login").notify(data.msg,"error");
                              }
                          },
                          error: function(err) {
                              console.log(err);
                              $("#password").notify("Có lỗi xảy ra. Vui lòng thử lại","error");

                          }
                      });
                  }
              });
      });
    });
  </script>
</body>
</html>