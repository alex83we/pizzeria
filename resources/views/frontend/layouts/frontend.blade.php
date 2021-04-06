<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Alexander Guthmann">
    <meta name="publisher" content="{{ config('app.name') }}">
    <meta name="copyright" content="Alexander Guthmann">
    <meta name="description" content="@yield('meta-description', 'Buttstädter Bistro, Windhöfe 31, 99628, Buttstädt, Ihre Pizzeria in Buttstädt. Wir bieten ihnen hier unsere Speisekarte, an die immer aktuell ist und sie können dann bei uns per Telefon bestellen.
Burger, Pizza, Döner, Kurdische Gerichte, Salat, Getränke')">
    <meta name="keywords" content="Burger, Pizza, Döner, Kurdische, Gerichte, Salat, Getränke, Nudeln, Steinofenpizza, Pide, Spezialitäten, Snacks, Aufläufe, Buttstädt, Bistro, Lieferservice, Essen, auf, Rädern, Windhöfe, Mindestbestellwert">
    <meta name="page-topic" content="Dienstleistung">
    <meta name="audience" content="Alle">
    <meta http-equiv="content-language" content="de">
    <meta name="robots" content="index, follow">
    <meta name="image" content="https://www.buttstaedter-bistro.de/images/logo.jpg">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="{{ config('app.name') }} | @yield('title')">
    <meta itemprop="description" content="@yield('meta-description', 'Buttstädter Bistro, Windhöfe 31, 99628, Buttstädt, Ihre Pizzeria in Buttstädt. Wir bieten ihnen hier unsere Speisekarte, an die immer aktuell ist und sie können dann bei uns per Telefon bestellen.
Burger, Pizza, Döner, Kurdische Gerichte, Salat, Getränke')">
    <meta itemprop="image" content="https://www.buttstaedter-bistro.de/images/logo.jpg">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta property="og:title" content="{{ config('app.name') }} | @yield('title')">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:description" content="@yield('meta-description', 'Buttstädter Bistro, Windhöfe 31, 99628, Buttstädt, Ihre Pizzeria in Buttstädt. Wir bieten ihnen hier unsere Speisekarte, an die immer aktuell ist und sie können dann bei uns per Telefon bestellen.
Burger, Pizza, Döner, Kurdische Gerichte, Salat, Getränke')">
    <meta property="og:locale" content="de_DE">
    <meta property="og:type" content="restaurant.menu">
    <meta property="og:image" content="https://www.buttstaedter-bistro.de/images/logo.jpg">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('app.name') }} | @yield('title')">
    <meta name="twitter:description" content="@yield('meta-description', 'Buttstädter Bistro, Windhöfe 31, 99628, Buttstädt, Ihre Pizzeria in Buttstädt. Wir bieten ihnen hier unsere Speisekarte, an die immer aktuell ist und sie können dann bei uns per Telefon bestellen.
Burger, Pizza, Döner, Kurdische Gerichte, Salat, Getränke')">
    <meta name="twitter:site" content="@buttstaedter-bistro">
    <meta name="twitter:creator" content="@buttstaedter-bistro">
    <meta name="twitter:image" content="https://www.buttstaedter-bistro.de/images/logo.jpg">
    <link rel="canonical" href="{{ url()->full() }}"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">


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
        &copy {{ date('Y') }} {{ config('app.name') }} | Created by <a href="https://www.thueringer-tuning-freunde.de/team/alex" target="_blank">Alex</a> | <a href="{{ route('frontend.impressum.index') }}">{{ __('Legal Notice') }}</a> | <a href="{{ route('frontend.datenschutz.index') }}">{{ __('Privacy') }}</a> |
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