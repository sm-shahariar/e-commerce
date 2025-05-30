<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'ShopEase' }}</title>

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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">


        <!-- Scripts -->
    </head>
    <body>



            @include('layouts.partials.header')
            @yield('content')
            @include('layouts.partials.footer')



        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{your-pixel-id-goes-here}');
        fbq('track', 'PageView');
        </script>
        <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={your-pixel-id-goes-here}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->


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

          @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}", 'Success!', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000
        });
    </script>
    @endif
     @if(session('error'))
    <script>
        toastr.error("{{ session('error') }}", 'Error!', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000
        });
    </script>
    @endif
    </body>
</html>
