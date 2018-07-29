<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="Ariful Haque <arifulhb@gmail.com>">

        <title>@yield('title')</title>

        @include('npms.site.assets.header_css')

    </head>

    <body  id="page-top">

        @include('npms.site.components.navbar')
        @include('npms.site.components.header')


        @yield('content')

        @include('npms.site.components.footer')

        @include('npms.site.assets.footer_js')

    </body>

</html>
