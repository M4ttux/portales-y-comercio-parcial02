<!-- Modal Eliminar Usuario -->
<div class="modal fade" id="eliminarUsuarioModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="eliminarModalLabel{{ $usuario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title" id="eliminarModalLabel{{ $usuario->id }}">Eliminar Usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar al usuario <strong>{{ $usuario->name }}</strong>?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
