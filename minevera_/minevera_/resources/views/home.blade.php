<!DOCTYPE html>
<html lang="es">

<head>
    @include('components.head')
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">
    <title>HomePage</title>
</head>

<body>
    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- ======= Main ======= -->
    @include('main.mainHome')
    <!-- ======= Footer ======= -->
    @include('components.footer')
    <!-- SCRIPTS --> 
    @include('components.jsFiles')
</body>

</html>