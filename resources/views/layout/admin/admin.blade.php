<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>
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
    <link rel="stylesheet" type="text/css" href="./admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="./admin/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="./admin/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="./admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="./admin/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./admin/dropify.css">
    <link rel="stylesheet" href="./admin/bootstrap-4.css">
     <!-- JS -->
    <script src="./admin/vendors/scripts/core.js"></script>
    <script src="./admin/jquery.validate.min.js"></script>
    <script src="./admin/notify.js"></script>
    <script src="./admin/dropify.js"></script>
    <script src="./admin/sweetalert2.all.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>
    @include('layout.admin.header')
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
         @yield('content')
        <div class="pd-ltr-20">
             @include('layout.admin.footer')
        </div>
    </div>
    <!-- js -->
    <script src="./admin/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="./admin/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="./admin/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="./admin/vendors/scripts/script.min.js"></script>
    <script src="./admin/vendors/scripts/process.js"></script>
    <script src="./admin/vendors/scripts/layout-settings.js"></script>
    <script src="./admin/vendors/scripts/dashboard.js"></script>

</body>
</html>