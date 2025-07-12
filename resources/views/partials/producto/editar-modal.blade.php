<?php
/**
 * Panel de Administrador
 * Modal para Editar Producto
 *
 * @var \App\Models\Articulos $articulo
 */
?>
<!-- Modal Editar Producto -->
<div class="modal fade" id="editarModal{{ $articulo->id }}" tabindex="-1"
    aria-labelledby="editarModalLabel{{ $articulo->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('articulos.update', $articulo->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning text-dark">
                    <h4 class="modal-title" id="editarModalLabel{{ $articulo->id }}">Editar Producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombre{{ $articulo->id }}" class="form-label required">Nombre</label>
                            <input type="text" name="nombre" id="nombre{{ $articulo->id }}"
                                class="form-control" value="{{ $articulo->nombre }}" required>
                        </div>
                        <div class="col">
                            <label for="precio{{ $articulo->id }}" class="form-label required">Precio</label>
                            <input type="number" name="precio" id="precio{{ $articulo->id }}"
                                class="form-control" step="0.01" value="{{ $articulo->precio }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion{{ $articulo->id }}" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion{{ $articulo->id }}" class="form-control"
                            rows="1">{{ $articulo->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="talles" class="form-label required">Talles disponibles:</label>
                        <select name="talles[]" id="talles" class="form-select" multiple required>
                            @foreach ($talles as $talle)
                                <option value="{{ $talle->id }}" {{ $articulo->talles->contains('id', $talle->id) ? 'selected' : '' }}>
                                    {{ $talle->talle }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Usá Ctrl (o Cmd en Mac) para seleccionar múltiples talles.</div>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label required">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-select" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->categoria_id }}" {{ $articulo->categoria_id == $categoria->categoria_id ? 'selected' : '' }}>
                                    {{ $categoria->categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="cantidad{{ $articulo->id }}"
                                class="form-label required">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad{{ $articulo->id }}"
                                class="form-control" value="{{ $articulo->cantidad }}" required>
                        </div>
                        <div class="col">
                            <label for="fecha_creacion{{ $articulo->id }}" class="form-label">Fecha de
                                creación</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion{{ $articulo->id }}"
                                class="form-control" value="{{ $articulo->fecha_creacion }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="imagen{{ $articulo->id }}" class="form-label">Imagen</label>
                        <input type="file" name="imagen" id="imagen{{ $articulo->id }}" class="form-control"
                            >
                        @if ($articulo->imagen)
                            <small class="text-muted">Actual: {{ $articulo->imagen }}</small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="imagen_hover{{ $articulo->id }}" class="form-label">Imagen
                            Hover</label>
                        <input type="file" name="imagen_hover" id="imagen_hover{{ $articulo->id }}"
                            class="form-control">
                        @if ($articulo->imagen_hover)
                            <small class="text-muted">Actual: {{ $articulo->imagen_hover }}</small>
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