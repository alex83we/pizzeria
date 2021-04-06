<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
</head>
<body>
@include('frontend.layouts.partials.header')

@yield('content')

<!-- Footer -->
<footer>
    <div class="footer__copyright">
        &copy {{ date('Y') }} {{ config('app.name') }} | Created by <a href="https://www.thueringer-tuning-freunde.de/team/alex" target="_blank">Alex</a> | <a href="./impressum">{{ __('Legal Notice') }}</a> | <a href="./datenschutz">{{ __('Privacy') }}</a> |
        <span>{{ __('all final prices incl. 19% VAT.') }}</span>
    </div>
</footer>

<!-- Back to Top -->
<div id="back-to-top"><a class="top arrow"><i class="fa fa-chevron-up"></i></a></div>

<!-- Optional JavaScript -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="lib/owlcarousel/dist/owl.carousel.min.js"></script>


@stack('js')
</body>
</html>