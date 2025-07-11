@extends('layout.app')

@section('title', 'Noticias')

@section('content')
<div id="seccion-libre" class="my-5">
    <div class="container">
        <div class="title pt-3 pb-2">
            <h2 class="position-relative d-inline-block ms-4">Últimas Novedades</h2>
        </div>

        <!-- Párrafo introductorio -->
        <p class="text-muted mb-4">
            En esta sección te compartimos todas las últimas noticias y novedades relacionadas con el Club Atlético River Plate. ¡Mantenete al día con todo lo que ocurre en el mundo millonario!
        </p>

        <div class="row row-cols-1 g-4">
            @forelse($noticias as $noticia)
                <div class="col">
                    <div class="card border-0 shadow-sm flex-md-row h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h3 class="card-title">{{ $noticia->titulo }}</h3>
                            <p class="card-text">{{ $noticia->contenido }}</p>
                        </div>

                        @if ($noticia->imagen)
                            <div class="d-none d-md-block" style="max-width: 300px;">
                                <img src="{{ Storage::url('images/noticias/' . $noticia->imagen) }}"
                                    alt="{{ $noticia->titulo }}"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    style="object-position: center;">
                            </div>

                            <!-- En móvil, imagen debajo del texto -->
                            <div class="d-block d-md-none mt-3">
                                <img src="{{ Storage::url('images/noticias/' . $noticia->imagen) }}"
                                    alt="{{ $noticia->titulo }}"
                                    class="img-fluid w-100 object-fit-cover">
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">No hay novedades por el momento.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
