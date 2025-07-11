<?php
/**
 * Detalle del producto
 *
 * @var \App\Models\Articulos $articulo
 */
?>

@extends('layout.app')

@section('title', 'Detalle del Producto')

@section('content')
    <div id="detalle-producto" class="container py-5">
        <div class="row justify-content-center align-items-center g-4">
            <div class="col-lg-5 col-md-12 text-center">
                <div class="position-relative rounded shadow overflow-hidden">
                    <img src="{{ Storage::url('images/productos/' . $articulo->imagen) }}"
                        alt="Imagen principal de {{ $articulo->nombre }}" class="img-fluid rounded img-original"
                        style="height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                    <img src="{{ Storage::url('images/productos/' . $articulo->imagen_hover) }}"
                        alt="Imagen secundaria de {{ $articulo->nombre }}"
                        class="img-fluid rounded img-hover position-absolute top-0 start-50 translate-middle-x"
                        style="height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                </div>
            </div>
            <div class="col-lg-7 px-4">
                <div class="title col-md-6 mb-4 mx-4">
                    <h2 class="position-relative d-inline-block">{{ $articulo->nombre }}</h2>
                </div>

                <h3 class="mb-4">
                    <i class="bi bi-currency-dollar me-2"></i>{{ number_format($articulo->precio, 2, ',', '.') }} ARS
                </h3>

                <ul class="list-unstyled fs-5">
                    <li class="mb-3">
                        <i class="bi bi-info-circle-fill text-primary me-2"></i>
                        <strong>Descripción:</strong> {{ $articulo->descripcion }}
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-aspect-ratio-fill text-secondary me-2"></i>
                        <strong>Talles:</strong>
                        @foreach ($articulo->talles as $talle)
                            <span class="badge bg-secondary me-1">{{ $talle->talle }}</span>
                        @endforeach
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-tag-fill text-warning me-2"></i>
                        <strong>Categoría:</strong> {{ $articulo->categorias->categoria }}
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-box-seam-fill text-info me-2"></i>
                        <strong>Stock:</strong> {{ $articulo->cantidad }} unidades
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-calendar-fill text-danger me-2"></i>
                        <strong>Lanzamiento:</strong> {{ $articulo->fecha_creacion }}
                    </li>
                </ul>
                <form action="{{ route('carrito.store') }}" method="POST" class="mt-2 d-flex gap-2 align-items-center w-50">
                    @csrf
                    <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">

                    <input type="number" name="cantidad" value="1" min="1"
                        class="form-control form-control-sm w-25 align-self-center m-0">

                    <button type="submit" class="btn btn-detalles btn-sm">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al carrito
                    </button>
                </form>


            </div>
        </div>
    </div>

@endsection