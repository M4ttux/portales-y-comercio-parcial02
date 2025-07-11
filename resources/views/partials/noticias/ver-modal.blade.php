<!-- Modal Ver Noticia -->
<div class="modal fade" id="verNoticiaModal{{ $noticia->id }}" tabindex="-1" aria-labelledby="verModalLabel{{ $noticia->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title" id="verModalLabel{{ $noticia->id }}">Detalles de la Noticia</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center">
                        @if ($noticia->imagen)
                            <img src="{{ Storage::url('images/noticias/' . $noticia->imagen) }}" class="img-fluid mb-3" alt="{{ $noticia->titulo }}">
                        @else
                            <p>Sin imagen</p>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <p><strong>Nombre:</strong> {{ $noticia->titulo }}</p>
                        <p><strong>Descripción:</strong> {{ $noticia->contenido ?? 'Sin descripción' }}</p>
                        <p><strong>Última actualización:</strong> {{ $noticia->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>