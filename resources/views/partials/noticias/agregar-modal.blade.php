<!-- Modal Agregar Noticia -->
<div class="modal fade" id="agregarNoticiaModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header bg-success text-white">
                    <h4 class="modal-title" id="agregarModalLabel">Agregar Nueva Noticia</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="titulo" class="form-label">Nombre</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Descripción</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
