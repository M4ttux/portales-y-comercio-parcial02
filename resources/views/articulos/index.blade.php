@extends('layout.app')

@section('title', 'Productos')

@section('content')


<div class="container pt-3 pb-5">
    <div class="bg-light row align-items-center shadow-sm my-4 mx-1 p-4">
        <!-- Título y subtítulo -->
        <div class="title col-md-6 mb-4 mb-md-0">
            <h2 class="position-relative d-inline-block">Catálogo</h2>
            <p class="subtitulo my-2">Todo en indumentaria de River Plate</p>
        </div>

        <div class="col-md-6">
        <div>
            <form method="GET" action="{{ route('articulos.index') }}">
                <div class="row g-3 align-items-end">
    
                    <!-- Categoría -->
                    <div class="col-12 col-md-4">
                        <label for="categoria" class="form-label fw-semibold">
                            <i class="fas fa-tags me-1 text-danger"></i> Categoría
                        </label>
                        <select class="form-select {{ request('categoria') ? 'border-danger' : '' }}" id="categoria" name="categoria">
                            <option value="">Todas las categorías</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->categoria }}" {{ request('categoria') == $categoria->categoria ? 'selected' : '' }}>
                                    {{ ucfirst($categoria->categoria) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Talle -->
                    <div class="col-12 col-md-4">
                        <label for="talle" class="form-label fw-semibold">
                            <i class="fas fa-ruler-combined me-1 text-danger"></i> Talle
                        </label>
                        <select class="form-select {{ request('talle') ? 'border-danger' : '' }}" id="talle" name="talle">
                            <option value="">Todos los talles</option>
                            @foreach($talles as $talle)
                                <option value="{{ $talle->talle }}" {{ request('talle') == $talle->talle ? 'selected' : '' }}>
                                    {{ $talle->talle }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Precio -->
                    <div class="col-12 col-md-4">
                        <label for="precio" class="form-label fw-semibold">
                            <i class="fas fa-dollar-sign me-1 text-danger"></i> Precio Max.
                        </label>
                        <input type="number" class="form-control {{ request('precio') ? 'border-danger' : '' }}" id="precio" name="precio" placeholder="Ej: 10000" value="{{ request('precio') }}">
                    </div>
    
                    <!-- Botones -->
                    <div class="col-12 d-flex justify-content-center gap-3 mt-3">
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fas fa-filter me-2"></i>Aplicar filtros
                        </button>
                        <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-times me-2"></i>Limpiar filtros
                        </a>
                    </div>
    
                </div>
            </form>
        </div>
    </div>
    </div>
    

    
    <!-- Productos -->
    <div class="row d-flex justify-content-left">
        @forelse($articulos as $articulo)
        <div class="col-12 col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative overflow-hidden" style="aspect-ratio: 1 / 1;">
                        <img 
                            class="w-100 h-100 object-fit-cover img-original transition-opacity" 
                            src="{{ Storage::url('images/productos/' . $articulo->imagen) }}" 
                            alt="{{ $articulo->nombre }}"
                        >
                        <img 
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0 img-hover transition-opacity" 
                            src="{{ Storage::url('images/productos/' . $articulo->imagen_hover) }}" 
                            alt="{{ $articulo->nombre }}"
                        >
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold text-truncate">{{ $articulo->nombre }}</h3>
                        <p class="card-text small text-muted">{{ $articulo->descripcion }}</p>
                        <p class="w-semibold">${{ number_format($articulo->precio, 2, ',', '.') }} ARS</p>
                        <a href="{{ route('articulos.detalle', ['id' => $articulo->id]) }}" class="btn btn-detalles btn-sm w-100">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center mt-5">No se encontraron productos con los filtros aplicados.</p>
        @endforelse
    </div>
    

@endsection
