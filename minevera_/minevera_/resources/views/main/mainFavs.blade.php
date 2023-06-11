<div class="container mt-2">
    <section>
        @if (count($favorites) > 0)
        @foreach ($favorites as $favorite)
        <div class="row d-flex align-content-center">
            <div class="col-7 align-self-center">
                <h2>{{ $favorite['title'] }}</h2>
            </div>
            <div class="col-3 align-self-center">
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
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <img src="{{ asset('storage/img/' . $favorite['img']) }}" alt="{{ $favorite['title'] }}" style="width: 200px;" class="img-fluid">
        </div>
        <div class="row">
            <h5>{{ $favorite['pax'] }}</h5>
        </div>
        <div class="row">
            <ul>
                @foreach ($favorite['ingredients'] as $ingredient)
                <li>{{ $ingredient['name'] }}: {{ $ingredient['amount'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <p>{{ $favorite['description'] }}</p>
        </div>
        @endforeach
        @else
        <div class="row">
            <p class="text-center">No tiene recetas guardadas en favoritos</p>
        </div>
        @endif
    </section>
</div>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>