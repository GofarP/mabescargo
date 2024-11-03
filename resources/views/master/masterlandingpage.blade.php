<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title','Judul')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('partials.partials-css.css-landingpage')

    </head>

    <body>

        <!-- Spinner Start -->
        @yield('spinner')

        <!-- Spinner End -->


        <!-- Topbar Start -->
        @yield('topbar')
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        @yield('navbarhero')
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        @yield('header')
        <!-- Header End -->

        <!-- About Start -->
        @yield('about')
        <!-- About End -->

        <!-- Footer Start -->
        @yield('footer')

        <!-- Footer End -->

       @yield('copyright')

        @include('partials.partials-javascript.javascript-landingpage')

    </body>

</html>
