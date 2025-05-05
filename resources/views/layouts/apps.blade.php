<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/nouislider.min.css') }}"/>
        <link rel="stylesheet" href="{{ url('build/css/add.css') }}">

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ url('build/css/font-awesome.min.css') }}" />

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/style-custom.css') }}"/>


        <!-- Scripts -->
    </head>
    <body>
            @include('layouts.partials.header')
            @include('layouts.partials.navigation')
            @yield('content')
            @include('layouts.partials.footer')


        <script src="{{ url('build/js/jquery.min.js') }}"></script>
		<script src="{{ url('build/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('build/js/slick.min.js') }}"></script>
		<script src="{{ url('build/js/nouislider.min.js') }}"></script>
		<script src="{{ url('build/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ url('build/js/main.js') }}"></script>

    </body>
</html>
