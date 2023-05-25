<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- file Files -->
    <link href="{{ asset('file/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('file/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('file/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('file/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('file/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- SCRIPTS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
    <title>HomePage</title>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="{{ asset('favicon/android-chrome-192x192.png') }}" class="img-fluid img-thumbnail" alt="logo">
                <h1>MiNevera</h1>
            </a>
            <!-- .navbar -->
            <nav id="navbar" class="navbarMain">
                <ul>
                    <li><a href="{{ route('huevos') }}">Huevos</a></li>
                    <li><a href="{{ route('vegetariana') }}">Vegetariana</a></li>
                    <li><a href="{{ route('pasta') }}">Pasta</a></li>
                    <li><a href="{{ route('arroz') }}">Arroz</a></li>
                    <li><a href="{{ route('carne') }}">Carne</a></li>
                    <li><a href="{{ route('pescado') }}">Pescado</a></li>
                    <li><a href="{{ route('guiso') }}">Guisos</a></li>
                    <li class="dropdown"><a href="#"><span>Consejos</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Técnicas de corte</a></li>
                            <li class="dropdown"><a href="#"><span>Tiempos de cocción</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Verduras</a></li>
                                    <li><a href="#">Carnes</a></li>
                                    <li><a href="#">Pescados</a></li>
                                    <li><a href="#">Huevo</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Técnicas de corte</a></li>
                            <li><a href="#">Otros</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <a href="{{ route('login') }}" class="btn-registro">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->
    <section id="form-search-ingredients" class="hero d-flex align-items-center section-bg mt-3">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-6 order-2 order-lg-2 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Busca recetas según los ingredientes que tengas por tu nevera</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-1 text-center text-lg-center mt-5">
                    <form action="{{ route('buscarRecetas') }}" method="POST" role="search">
                        @csrf
                        <div class="ingredientes">
                            <div class="input-group">
                                <input type="text" name="ingredientes[]" class="form-control input-text" placeholder="Ingrediente">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-agregar" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="images" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">¿A qué esperas?<br>Cocina ya esta deliciosa receta</h2>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="https://www.youtube.com/watch?v=LgYghvu6Vj4&ab_channel=Clean%26Delicious" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Ver video receta</span></a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <!-- file JS Files -->
    <script src="{{ asset('file/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('file/aos/aos.js') }}"></script>
    <script src="{{ asset('file/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('file/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('file/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('file/php-email-form/validate.js') }}"></script>

    <!-- JS Files -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/autocompleteIngredients.js') }}"></script>
    <script src="{{ asset('js/buscadorPorIng.js') }}"></script>
    <script>
        const URL_SEARCH = "{{ route('search') }}";
        
    </script>
</body>

</html>
