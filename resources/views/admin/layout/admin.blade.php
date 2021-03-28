<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    @stack('css')
</head>
<body class="hold-transition @yield('bodyTag')">
    <div class="wrapper" id="app">
        @include('admin.layout.partials.nav')
        @include('admin.layout.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('title')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <x-alert></x-alert>
                        @yield('content')
                    </div>
                </div>
            </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="./admin">{{ config('app.name') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/admin/app.js') }}"></script>
@stack('js')

    <script>
        $(".alert").delay(10000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>
</html>