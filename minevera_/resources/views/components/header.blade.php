<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <img src="{{ asset('favicon/android-chrome-192x192.png') }}" class="img-fluid img-thumbnail" alt="logo">
            <h1>MiNevera</h1>
        </a>
        <!-- .navbar -->
        <nav id="navbar" class="navbarMain">
            <ul>
                <li><a href="{{ route('categories.show', ['category' => 'Huevos']) }}">Huevos</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Vegetariana']) }}">Vegetariana</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Pasta']) }}">Pasta</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Arroz']) }}">Arroz</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Carne']) }}">Carne</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Pescado']) }}">Pescado</a></li>
                <li><a href="{{ route('categories.show', ['category' => 'Guisos']) }}">Guisos</a></li>
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
                @auth
                <li><a href="#">Favoritos</a></li>
                <li><a href="#">Perfil</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-registro">Cerrar sesión</button>
                </form>
                @endauth
            </ul>
        </nav>
        @guest
        <a href="{{ route('register') }}" class="btn-registro">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </a>
        @endguest
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>