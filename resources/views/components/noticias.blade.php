<div id="seccion-libre" class="my-5">
    <div class="container">
        <div class="title pt-3 pb-5">
        <h2 class="position-relative d-inline-block ms-4">Últimas Novedades</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse($noticias as $noticia)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        @if ($noticia->imagen)
                        <div class="overflow-hidden" style="aspect-ratio: 16/9;">
                        <img src="{{ Storage::url('images/noticias/' . $noticia->imagen) }}"
                            alt="{{ $noticia->titulo }}"
                            class="w-100 h-100 object-fit-cover"
                            style="display: block;">
                    </div>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ $noticia->titulo }}</h3>
                            <p class="card-text">{{ $noticia->contenido }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay novedades por el momento.</p>
            @endforelse
        </div>
    </div>
</div>