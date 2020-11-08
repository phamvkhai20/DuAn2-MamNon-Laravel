<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Roboto:300,400,500,600,700", "Roboto:300,400,500,600,700", "Asap+Condensed:500"]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>
    <style>
    .login {
        min-height: 100%;
        background-image: url("{{asset('assets/app/media/img/banner_full_hd.jpg')}}");
        width: 100%;
        background-repeat: no-repeat;
        background-size: contain;
    }
    </style>
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/demo10/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
        type="text/css" />
    <link rel="shortcut icon png" src="{{asset('assets/demo/img/logo/icon-logo.png')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="m-page--fluid m-page--loading-enabled m-page--loading m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">

    <!-- header -->
    @include('web/login/layouts/header')
    <!--end  header -->
    @yield('content')
    <script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/demo10/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <script>
    $(window).on('load', function() {
        $('body').removeClass('m-page--loading');
    });
    </script>
</body>

</html>