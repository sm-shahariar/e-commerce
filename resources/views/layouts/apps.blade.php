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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
         integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ url('build/css/style-custom.css') }}"/>

        <!-- Animate.css for animations -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- Toastr -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>


        <!-- Scripts -->
    </head>
    <body>



            @include('layouts.partials.header')
            @include('layouts.partials.navigation')
            @yield('content')
            @include('layouts.partials.footer')





        
        <!-- Load jQuery First -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


         <!-- Toastr -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
         <!-- Bootstrap JS for tabs -->
         <script src="{{ asset('build/js/bootstrap.bundle.min.js') }}"></script>         
        <!-- Then stack any custom scripts -->
        @stack('scripts')

        <!-- Then load other libraries -->
        <script src="{{ url('build/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('build/js/slick.min.js') }}"></script>
        <script src="{{ url('build/js/nouislider.min.js') }}"></script>
        <script src="{{ url('build/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ url('build/js/main.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
         crossorigin="anonymous"></script>
    </body>
</html>
