<!DOCTYPE html>
<html>

<head>
    @include('components.head')
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Error</title>
</head>

<body>
    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- ======= Main ======= -->
    <div class="container mt-2">
        <section>
            <h1>Error</h1>
            <p>{{ $message }}</p>
        </section>
    </div>
    <!-- ======= Footer ======= -->
    @include('components.footer')
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <!-- ======= JS FILES ======= -->
    @include('components.jsFiles')

</body>

</html>