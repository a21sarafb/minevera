<div class="container mt-2">
        <section>
            @if (count($favorites) > 0)
            <ul>
                @foreach ($favorites as $favorite)
                <li>
                    <h2>{{ $favorite['title'] }}</h2>
                    <img src="{{ asset('storage/img/' . $recipe['img']) }}" alt="{{ $recipe['title'] }}" style="width: 200px;">
                    <form method="POST" action="{{ route('removeFavorite') }}">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $favorite['id'] }}">
                        <button type="submit" class="btn-remove-favorite btn btn-primary" style="background-color:#ce1212;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg>
                        </button>
                    </form>
                    <h5>{{ $favorite['pax'] }}</h5>
                    <ul>
                        @foreach ($favorite['ingredients'] as $ingredient)
                        <li>{{ $ingredient['name'] }}: {{ $ingredient['amount'] }}</li>
                        @endforeach
                    </ul>
                    <p>{{ $favorite['description'] }}</p>
                </li>
                @endforeach
            </ul>

            @else
            <p>No tiene recetas guardadas en favoritos</p>
            @endif
        </section>
    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>