@extends('layout.app')

@section('title', 'Pago Fallido')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-times-circle text-danger" style="font-size: 4rem;"></i>
                    </div>
                    <h2 class="text-danger mb-3">Pago Fallido</h2>
                    <p class="lead">No se pudo procesar tu pago.</p>
                    <p>Por favor, intenta nuevamente o usa otro método de pago.</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary me-2">
                            <i class="fas fa-redo me-1"></i>
                            Intentar nuevamente
                        </a>
                        <a href="{{ route('carrito.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-shopping-cart me-1"></i>
                            Volver al carrito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
