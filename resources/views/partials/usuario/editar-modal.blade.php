<!-- Modal Editar Usuario -->
<div class="modal fade" id="editarUsuarioModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $usuario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning text-dark">
                    <h4 class="modal-title" id="editarModalLabel{{ $usuario->id }}">Editar Usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name{{ $usuario->id }}" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name{{ $usuario->id }}" class="form-control" value="{{ $usuario->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email{{ $usuario->id }}" class="form-label">Correo</label>
                        <input type="email" name="email" id="email{{ $usuario->id }}" class="form-control" value="{{ $usuario->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role{{ $usuario->id }}" class="form-label">Rol</label>
                        <select name="role" id="role{{ $usuario->id }}" class="form-select" required>
                            <option value="user" {{ $usuario->role == 'user' ? 'selected' : '' }}>Usuario</option>
                            <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password{{ $usuario->id }}" class="form-label">Nueva Contraseña (opcional)</label>
                        <input type="password" name="password" id="password{{ $usuario->id }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation{{ $usuario->id }}" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation{{ $usuario->id }}" class="form-control">
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
