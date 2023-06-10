<!DOCTYPE html>
<html>

<head>
    @include('components.head')
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Recetas</title>

</head>

<body>
    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- ======= Main ======= -->
    @include('main.mainAddRec')
    <!-- file JS Files -->
    @include('components.jsFiles')
    <!-- ======= Footer ======= -->
    @include('components.footer')
</body>

</html>
