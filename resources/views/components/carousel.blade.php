<!-- CARRUSEL -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Imagen 1 -->
        <div class="carousel-item active">
            <picture>
                <source media="(min-width: 769px)" srcset="{{ Storage::url('images/productos/carro2.png') }}">
                <source media="(min-width: 601px) and (max-width: 768px)"
                    srcset="{{ Storage::url('images/productos/carro2-respo-mobile.png') }}">
                <source media="(max-width: 600px)" srcset="{{ Storage::url('images/productos/carro2-respo-mobile.png') }}">
                <img src="{{ Storage::url('images/productos/carro2.png') }}" class="d-block w-100"
                    alt="Imagen Camiseta Alternativa river plate 2024">
            </picture>
        </div>

        <!-- Imagen 2 -->
        <div class="carousel-item">
            <a href="https://www.tiendariver.com/riverplate/indumentaria/tiempo-libre?PS=50&map=c,c,specificationFilter_35&O=OrderByReleaseDateDESC"
                target="_blank" rel="noopener noreferrer">
                <picture>
                    <source media="(min-width: 769px)" srcset="{{ Storage::url('images/productos/carro1.png') }}">
                    <source media="(min-width: 601px) and (max-width: 768px)"
                        srcset="{{ Storage::url('images/productos/carro1-respo-mobile.png') }}">
                    <source media="(max-width: 600px)" srcset="{{ Storage::url('images/productos/carro1-respo-mobile.png') }}">
                    <img src="{{ Storage::url('images/productos/carro1.png') }}" class="d-block w-100"
                        alt="Imagen Indumentaria Femenina River Plate 2024">
                </picture>
            </a>
        </div>

        <!-- Imagen 3 -->
        <div class="carousel-item">
            <picture>
                <source media="(min-width: 769px)" srcset="{{ Storage::url('images/productos/carro3.png') }}">
                <source media="(min-width: 601px) and (max-width: 768px)"
                    srcset="{{ Storage::url('images/productos/carro3-respo-mobile.png') }}">
                <source media="(max-width: 600px)" srcset="{{ Storage::url('images/productos/carro3-respo-mobile.png') }}">
                <img src="{{ Storage::url('images/productos/carro3.png') }}" class="d-block w-100"
                    alt="Imagen Regalo dia del padre river plate 2024">
            </picture>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- FIN CARRUSEL -->