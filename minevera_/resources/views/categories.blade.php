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
    <div class="container mt-2">
        <section>
            <h1>{{ $title }}</h1>
            <ul>
                @foreach ($recipes as $recipe)
                <li>
                    <h2>{{ $recipe['title'] }}</h2>
                    <h5>{{ $recipe['pax'] }}</h5>
                    <ul>
                        @foreach ($recipe['ingredients'] as $ingredient)
                        <li>{{ $ingredient['name'] }}: {{ $ingredient['amount'] }}</li>
                        @endforeach
                    </ul>
                    <p>{{ $recipe['description'] }}</p>
                </li>
                @endforeach
            </ul>
        </section>

    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <!-- file JS Files -->
    <script src="{{ asset('file/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Files -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</body>

</html>