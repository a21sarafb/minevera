<section class="mt-3 hero hero1 d-flex align-items-center section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 data-aos="fade-up">¡Ayudanos a crecer! Añade tu receta favorita</h2>
            </div>
        </div>
        <div class="row gy-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-lg-12 text-center text-lg-center mt-5">
                <form action="{{ url('/addRecipe') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-group-append m-2">
                            <label for="title">Título:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control input-text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group-append m-2">
                            <label for="description">Elaboración:</label>
                            <textarea name="description" id="description" class="form-control input-text">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 input-group-append">
                            <label for="pax">Comensales:</label>
                            <input type="text" name="pax" id="pax" value="{{ old('pax') }}" class="form-control input-text">
                        </div>
                        <div class="col-lg-6 mt-md-2 input-group-append">
                            <label for="photo">Foto:</label>
                            <input type="file" name="photo" id="photo" accept=".jpg,.jpeg,.png,.jfif">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group-append m-2">
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                                <label class="form-check-label">{{ $category->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <h2>Ingredientes:</h2>
                        <div class="ingredientes">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" name="ingredients[]" class="form-control input-text" placeholder="Ingrediente">
                                </div>
                                <div class="col-5">
                                    <input type="text" name="amounts[]" class="form-control input-text" placeholder="Cantidad">
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-outline-secondary btn-add" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="background-color:#ce1212;border: none;">Guardar receta</button>
                </form>
            </div>
        </div>
    </div>
</section>