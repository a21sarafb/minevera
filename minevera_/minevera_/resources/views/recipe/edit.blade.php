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
    @include('main.mainEditRec')
    <!-- ======= Footer ======= -->
    @include('components.footer')
    
</body>
<!-- file JS Files -->
@include('components.jsFiles')
</html>