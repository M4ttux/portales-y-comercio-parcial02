@extends('admin.index')

@section('admin-section')
<div class="container mt-4">
    <h3 class="mt-4">Listado de Noticias</h3>

    <div class="modal-footer d-flex justify-content-center mt-4">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarNoticiaModal">Agregar Noticia</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-2 equal-width-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->id }}</td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ Str::limit($noticia->contenido, 100) }}</td>
                        <td>
                            @if ($noticia->imagen)
                                <img src="{{ Storage::url('images/noticias/' . $noticia->imagen) }}" alt="Imagen" class="img-thumbnail mx-auto d-block" style="width: 100px; height: auto;">
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verNoticiaModal{{ $noticia->id }}">Ver</button>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarNoticiaModal{{ $noticia->id }}">Editar</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarNoticiaModal{{ $noticia->id }}">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    @include('partials.noticias.ver-modal', ['noticia' => $noticia])
                    @include('partials.noticias.editar-modal', ['noticia' => $noticia])
                    @include('partials.noticias.eliminar-modal', ['noticia' => $noticia])
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.noticias.agregar-modal')
</div>
@endsection
