<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
    @include('../partials.head')
</head>
<body>

    @include('../partials.nav')

    @yield('content')

    @include('../partials/footer')
</body>

</html>