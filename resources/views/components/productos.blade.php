<div id="productos-home">
        <div class="row d-flex justify-content-center">
            <div class="title pt-3 pb-5" id="titulo-descuento">
                <h2 class="position-relative d-inline-block ms-4">Explora Nuestra variedad de Productos </h2>
            </div>
            <!-- falta cargar catalogos -->
            <div class="row d-flex justify-content-left">
                @forelse($productosDestacados as $articulo)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative overflow-hidden" style="aspect-ratio: 1 / 1;">
                                <img 
                                    class="w-100 h-100 object-fit-cover img-original transition-opacity" 
                                    src="{{ Storage::url('images/productos/' . $articulo->imagen) }}" 
                                    alt="{{ $articulo->nombre }}"
                                >
                                @if($articulo->imagen_hover)
                                    <img 
                                        class="w-100 h-100 object-fit-cover position-absolute top-0 start-0 img-hover transition-opacity" 
                                        src="{{ Storage::url('images/productos/' . $articulo->imagen_hover) }}" 
                                        alt="{{ $articulo->nombre }}"
                                    >
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title fw-bold text-truncate">{{ $articulo->nombre }}</h3>
                                <p class="card-text small text-muted">{{ $articulo->descripcion }}</p>
                                <p class="fw-semibold">${{ number_format($articulo->precio, 2, ',', '.') }} ARS</p>
                                <a href="{{ route('articulos.detalle', ['id' => $articulo->id]) }}" class="btn btn-detalles btn-sm w-100">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center mt-5">No hay productos disponibles en este momento.</p>
                @endforelse
            </div>

        </div>
    </div>