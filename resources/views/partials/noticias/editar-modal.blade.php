<!-- Modal Editar Noticia -->
<div class="modal fade" id="editarNoticiaModal{{ $noticia->id }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $noticia->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning text-dark">
                    <h4 class="modal-title" id="editarModalLabel{{ $noticia->id }}">Editar Noticia</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="titulo{{ $noticia->id }}" class="form-label">Nombre</label>
                            <input type="text" name="titulo" id="titulo{{ $noticia->id }}" class="form-control" value="{{ $noticia->titulo }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contenido{{ $noticia->id }}" class="form-label">Descripción</label>
                        <textarea name="contenido" id="contenido{{ $noticia->id }}" class="form-control" rows="3">{{ $noticia->contenido }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagen{{ $noticia->id }}" class="form-label">Imagen</label>
                        <input type="file" name="imagen" id="imagen{{ $noticia->id }}" class="form-control">
                        @if ($noticia->imagen)
                            <small class="text-muted">Actual: {{ $noticia->imagen }}</small>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
