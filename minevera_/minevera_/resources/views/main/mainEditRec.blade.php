<div class="container mt-2">
    <section>
        <div class="row justify-content-between gy-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-lg-12 text-center mt-5">
                <form action="{{ url('/updateRecipe/' . $recipe['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                    <div class="row">
                        <div class="input-group-append m-2">
                            <label for="title">Título:</label>
                            <input type="text" name="title" id="title" value="{{ $recipe['title'] }}" class="form-control input-text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group-append m-2">
                            <label for="description">Elaboración:</label>
                            <textarea name="description" id="description" class="form-control input-text" style="height: auto">{{ $recipe['description'] }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 input-group-append">
                            <label for="pax">Comensales:</label>
                            <input type="text" name="pax" id="pax" value="{{ $recipe['pax'] }}" class="form-control input-text">
                        </div>
                        <div class="col-lg-6 mt-md-2 input-group-append">
                            <label for="photo">Foto:</label>
                            <input type="file" name="photo" id="photo" accept=".jpg,.jpeg,.png,.jfif">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group-append m-2">
                            <div>
                                @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" @if($recipe->categories->contains($category)) checked @endif>
                                    <label class="form-check-label" for="category_{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h2>Ingredientes:</h2>
                        <div class="ingredientes">
                            @foreach($recipe['ingredients'] as $index => $ingredient)
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" name="ingredients[]" class="form-control input-text" value="{{ $ingredient['name'] }}" placeholder="Ingrediente">
                                </div>
                                <div class="col-5">
                                    <input type="text" name="amounts[]" class="form-control input-text" value="{{ $ingredient['pivot']['amount'] }}" placeholder="Cantidad">
                                </div>
                                <div class="col-2">
                                    @if($index === 0)
                                    <button class="btn btn-outline-secondary btn-add" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </button>
                                    @else
                                    <button class="btn btn-outline-secondary btn-elim" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary mt-3" style="background-color:#ce1212;border: none;">Guardar receta</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>