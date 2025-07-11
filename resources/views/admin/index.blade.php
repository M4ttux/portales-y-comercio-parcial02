@extends('layout.app')
@section('title', 'Panel de Administrador')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Panel de Administrador</h2>

    @if (request()->routeIs('admin.index'))
        {{-- Vista de botones grandes estilo tarjetas --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'articulos']) }}" class="btn btn-primary w-100 p-4 text-white fs-5 fw-medium">🛒 Artículos</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'talles']) }}" class="btn btn-secondary w-100 p-4 text-white fs-5 fw-medium">📏 Talles</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'categorias']) }}" class="btn btn-success w-100 p-4 text-white fs-5 fw-medium">📂 Categorías</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'usuarios']) }}" class="btn btn-danger w-100 p-4 text-white fs-5 fw-medium">👤 Usuarios</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'mensajes']) }}" class="btn btn-warning w-100 p-4 text-black fs-5 fw-medium">✉️ Mensajes</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'noticias']) }}" class="btn btn-info w-100 p-4 text-black fs-5 fw-medium">📰 Noticias</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'ventas']) }}" class="btn btn-dark w-100 p-4 text-white fs-5 fw-medium">💰 Ventas</a>
            </div>

        </div>
    @else
        {{-- Si hay una sección activa, mostrar los botones normales --}}
        <div class="d-flex justify-content-center gap-2 my-4 flex-wrap">
            <a href="{{ route('admin.section', ['seccion' => 'articulos']) }}" class="btn btn-primary fw-medium">Artículos</a>
            <a href="{{ route('admin.section', ['seccion' => 'talles']) }}" class="btn btn-secondary fw-medium">Talles</a>
            <a href="{{ route('admin.section', ['seccion' => 'categorias']) }}" class="btn btn-success fw-medium">Categorías</a>
            <a href="{{ route('admin.section', ['seccion' => 'usuarios']) }}" class="btn btn-danger fw-medium">Usuarios</a>
            <a href="{{ route('admin.section', ['seccion' => 'mensajes']) }}" class="btn btn-warning fw-medium">Mensajes</a>
            <a href="{{ route('admin.section', ['seccion' => 'noticias']) }}" class="btn btn-info fw-medium">Noticias</a>
            <a href="{{ route('admin.section', ['seccion' => 'ventas']) }}" class="btn btn-dark fw-medium">Ventas</a>
        </div>
    @endif

    @yield('admin-section')
</div>
@endsection
