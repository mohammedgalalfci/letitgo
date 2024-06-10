<!doctype html>
@if (App::getLocale() == 'ar')
<html class="no-js" dir="rtl" lang="ar">
@else
<html class="no-js" dir="ltr" lang="en">
@endif

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="{{__('language.let_it_go')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('site/assets/img/logo/logo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('site/assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/rtl.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('site/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/responsive.css')}}">
    @endif
    <style>
    /* CSS for desktop and mobile */
    .header-btn-language {
        display: none;
        /* Initially hide the language switcher button */
    }

    /* CSS for desktop */
    @media (min-width: 992px) {
        .header-btn-language {
            display: block;
            /* Display the language switcher button on desktop */
        }

        .logo img {
            max-height: 70px;
        }
    }

    /* CSS for mobile */
    @media (max-width: 991px) {
        .header-btn-language {
            display: block;
            /* Display the language switcher button on mobile */
        }
    }

    .page-item.active .page-link {
        background-color: #bc2a25;
        border-color: #bc2a25;
    }

    .page-link {
        color: #bc2a25;
    }

    .page-link:hover {
        color: #bc2a25;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    .language-switcher .dropdown-toggle{
        background-color: transparent;
        color :#e6e6e6;
        border :none;
    }
    </style>
    @yield('css')
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('site.layouts.header')
    <!-- header-area-end -->


    <!-- main-area -->
    <main>

        @yield('content')

    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    @include('site.layouts.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="{{asset('site/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('site/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('site/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('site/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('site/assets/js/jquery.odometer.min.js')}}"></script>
    <script src="{{asset('site/assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('site/assets/js/tween-max.min.js')}}"></script>
    <script src="{{asset('site/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('site/assets/js/slick-animation.min.js')}}"></script>
    <script src="{{asset('site/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('site/assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('site/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('site/assets/js/main.js')}}"></script>

    @yield('js')
</body>

</html>