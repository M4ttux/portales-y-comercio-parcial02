@extends('layout.app')

@section('title', 'Pago Pendiente')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-clock text-warning" style="font-size: 4rem;"></i>
                    </div>
                    <h2 class="text-warning mb-3">Pago Pendiente</h2>
                    <p class="lead">Tu pago está siendo procesado.</p>
                    <p>Te notificaremos por email cuando se confirme el pago.</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">
                            <i class="fas fa-home me-1"></i>
                            Volver al inicio
                        </a>
                        <a href="{{ route('perfil.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-user me-1"></i>
                            Ver mis pedidos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
