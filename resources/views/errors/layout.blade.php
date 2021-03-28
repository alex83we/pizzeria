<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style type="text/css" title="text/css" media="screen">
        .background {
            background: linear-gradient(90deg, rgba(18,18,18,0.4) 35%, rgba(18,18,18,0.6) 100%),url("https://cdn.pixabay.com/photo/2017/02/15/10/57/pizza-2068272_960_720.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            max-width: 450px;
            width: 450px;
        }

        .wrapper h1 {
            text-align: center;
            color: #fff;
            font-family: 'Barlow', sans-serif;
            font-size: 75px;
            margin-bottom: 0px;
            font-weight: 800;
        }

        .wrapper h3, .wrapper p {
            text-align: center;
            color: #fff;
            font-size: 16px;
            line-height: 23px;
            max-width: 200px;
            margin: 0 auto;
            font-weight: 400;
        }

        .wrapper .btn-mitte {
            text-align: center;
            vertical-align: middle;
            margin: 0 auto;
            display: block;
        }

        @media (min-width: 576px) {

            .wrapper h1 {
                font-size: 100px;
            }

            .wrapper h3,.wrapper p {
                font-size: 19px;
                max-width: 330px;
                margin: 0 auto 30px auto;
            }
        }
    </style>
</head>
<body>

@yield('content')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>