<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script rel="dns-prefetch" src="https://5f3c395.ccm19.de/app/public/ccm19.js?apiKey=928d8942ad49b5b54e0b263b3d1c7a6caadd02c1c42b3590&amp;domain=6921a86" referrerpolicy="origin"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="expires" content="86400">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @laravelPWA
    @stack('css')

    <!-- Meta Angaben -->
    <meta name="author" content="Alexander Guthmann">
    <meta name="publisher" content="{{ config('app.name') }}">
    <meta name="copyright" content="Alexander Guthmann">
    <meta name="description" content="@yield('meta-description', Str::limit('Buttstädter Bistro, Windhöfe 31, 99628, Buttstädt, Ihre Pizzeria in Buttstädt. Wir bieten ihnen hier unsere Speisekarte, an die immer aktuell ist und sie können dann bei uns per Telefon bestellen. Burger, Pizza, Döner, Kurdische Gerichte, Salat, Getränke'))">
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

    <!-- Sharethis -->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6070908a9269c20011a2a3e4&product=analytics' async='async'></script>
{{--    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60708eaeb655eb0012793bec&product=sticky-share-buttons" async="async"></script>--}}
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLN4C2B"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('frontend.layouts.partials.header')

@yield('content')

<div class="sharethis-sticky-share-buttons"></div>
<!-- Footer -->
<footer>
    <div class="footer__copyright">
        &copy {{ date('Y') }} {{ config('app.name') }} | Created by <a href="https://www.thueringer-tuning-freunde.de/team/alex" target="_blank" rel="noopener">Alex</a> | <a href="{{ route('frontend.impressum.index') }}">{{ __('Legal Notice') }}</a> | <a href="{{ route('frontend.datenschutz.index') }}">{{ __('Privacy') }}</a> | <a href="#" onclick="CCM.openWidget();return false;">Cookie bearbeiten</a> |
        <span>{{ __('all final prices incl. 19% VAT.') }}</span>
    </div>
</footer>

<!-- Back to Top -->
<div id="back-to-top"><button class="btn top arrow" style="line-height: 0;"><i class="fa fa-chevron-up"></i></button></div>


<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
<!-- Optional JavaScript -->
@stack('js')
</body>
</html>