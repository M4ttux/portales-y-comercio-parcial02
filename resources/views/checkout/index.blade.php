@extends('layout.app')
@section('title', 'Confirmar Compra')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">🧾 Resumen de tu Compra</h2>

        <div class="table-responsive">
            <table class="table table-bordered rounded overflow-hidden align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Artículo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="align-middle">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ Storage::url('images/productos/' . $item->articulo->imagen) }}"
                                        alt="{{ $item->articulo->nombre }}"
                                        style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                    {{ $item->articulo->nombre }}
                                </div>
                            </td>
                            <td class="text-center">${{ number_format($item->articulo->precio, 2) }}</td>
                            <td class="text-center">{{ $item->cantidad }}</td>
                            <td class="text-center">${{ number_format($item->articulo->precio * $item->cantidad, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="table-light fw-bold">
                        <td colspan="3" class="text-end">Total:</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4">
            <a href="{{ route('carrito.index') }}" class="btn btn-outline-secondary flex-fill flex-md-grow-0">
                <i class="fas fa-arrow-left me-1"></i> Volver al carrito
            </a>
            <div id="checkout" class="flex-fill flex-md-grow-0"></div>
        </div>
        <div>
            <script src="https://sdk.mercadopago.com/js/v2"></script>
            <script>
                const mp = new MercadoPago('{{ $publicKey }}', {
                    locale: 'es-AR'
                });
                mp.bricks().create("wallet", "checkout", {
                        initialization: {
                            preferenceId: '{{ $preference->id }}',
                            redirectMode: 'self',
                        },
                        customization: {
                            texts: {
                                action: "pay",
                                valueProp: 'security_safety',
                            },
                        },
                    },
                )
            </script>
        </div>
    </div>
@endsection