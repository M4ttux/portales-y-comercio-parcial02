@extends('layout.app')
@section('title', 'Carrito de Compras')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🛒 Mi Carrito</h2>

    @if($items->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered rounded overflow-hidden align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Artículo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    @php
                        $subtotal = $item->articulo->precio * $item->cantidad;
                        $total += $subtotal;
                    @endphp
                    <tr class="align-middle">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ Storage::url('images/productos/' . $item->articulo->imagen) }}" alt="{{ $item->articulo->nombre }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                <span>{{ $item->articulo->nombre }}</span>
                            </div>
                        </td>
                        <td class="text-center">${{ number_format($item->articulo->precio, 2) }}</td>
                        <td class="text-center align-middle">
                            <form action="{{ route('carrito.update', $item->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @csrf
                                @method('PUT')
                                <input type="number"
                                    name="cantidad"
                                    value="{{ $item->cantidad }}"
                                    min="1"
                                    class="form-control form-control-sm text-center"
                                    style="width: 80px; margin-bottom: 0 !important;">
                                <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                            </form>
                        </td>
                        <td class="text-center">${{ number_format($subtotal, 2) }}</td>
                        <td class="text-center">
                            <form action="{{ route('carrito.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="table-light fw-bold">
                    <td colspan="3" class="text-end">Total:</td>
                    <td colspan="2">${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Acciones --}}
    <div class="d-flex flex-wrap justify-content-between gap-2 mt-4">
        <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary flex-fill flex-md-grow-0">
            <i class="fas fa-plus me-1"></i> Seguir comprando
        </a>
        <a href="{{ route('checkout.index') }}" class="btn btn-success flex-fill flex-md-grow-0">
            <i class="fas fa-shopping-cart me-1"></i> Finalizar Compra
        </a>
    </div>
@else
    <div class="text-center my-5">
        <p class="text-muted">Tu carrito está vacío.</p>
        <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary mt-3">
            <i class="fas fa-plus me-1"></i> Agrega artículos
        </a>
    </div>
@endif
</div>
@endsection
