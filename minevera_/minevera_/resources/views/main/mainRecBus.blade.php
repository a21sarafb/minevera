<div class="container mt-2">
    <section>
        @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
        <div class="row d-flex align-content-center">
            <div class="col-7 align-self-center">
                <h2>{{ $recipe['title'] }}</h2>
            </div>
            <div class="col-3 align-self-center">
                <!-- buttonFav -->
                @include('components.buttonFav')
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <img src="{{ asset('storage/img/' . $recipe['img']) }}" alt="{{ $recipe['title'] }}" style="width: 200px;" class="img-fluid">
        </div>
        <div class="row">
            <h5>{{ $recipe['pax'] }}</h5>
        </div>
        <div class="row">
            <ul>
                @foreach ($recipe['ingredients'] as $ingredient)
                <li>{{ $ingredient['name'] }}: {{ $ingredient['amount'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <p>{{ $recipe['description'] }}</p>
        </div>
        @endforeach
        @else
        <p>Lo siento. No tenemos recetas con ese ingrediente</p>
        @endif
    </section>
</div>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>