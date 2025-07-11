@extends('admin.index')

@section('admin-section')
    <div class="container mt-4">
        <h3 class="mt-4">Listado de Usuarios</h3>
        <div class="modal-footer d-flex justify-content-center mt-4">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">Agregar
                Usuario</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mt-2 equal-width-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Ordenes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->role }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verOrdenesModal{{ $usuario->id }}">
                                        Órdenes
                                    </button>

                                </div>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editarUsuarioModal{{ $usuario->id }}">Editar</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#eliminarUsuarioModal{{ $usuario->id }}">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @include('partials.usuario.editar-modal', ['usuario' => $usuario])
                        @include('partials.usuario.eliminar-modal', ['usuario' => $usuario])
                        @include('partials.usuario.ordenes-modal', ['usuario' => $usuario])
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('partials.usuario.agregar-modal')
    </div>
@endsection