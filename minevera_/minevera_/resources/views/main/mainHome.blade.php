<section id="form-search-ingredients" class="hero1 hero d-flex align-items-center section-bg mt-3">
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
                                <button type="submit" class="btn btn-primary" style="background-color:#ce1212;border: none;">
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