<header id="header" class="header fixed-top d-flex align-items-center mb-6">
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
                @auth
                <li><a href="{{ route('showFavorites') }}">Favoritos</a></li>
                <li><a href="{{ route('recipes.create') }}">Añadir receta</a></li>
                <form action="{{ route('profile.edit') }}">
                    @csrf
                    <button type="submit" class="btn-registro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>
                    </button>
                </form>
                @endauth
            </ul>
        </nav>
        @guest
        <a href="{{ route('register') }}" class="btn-registro">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>
        </a>
        @endguest
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>