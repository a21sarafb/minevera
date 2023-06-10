<!DOCTYPE html>
<html>

<head>
    @include('components.head')
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
</head>

<body>
    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- ======= Main ======= -->
    @include('main.mainCateg')
    <!-- ======= Footer ======= -->
    @include('components.footer')
    <!-- file JS Files -->
    @include('components.jsFiles')
</body>

</html>