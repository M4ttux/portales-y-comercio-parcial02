@extends('layout.app')

@section('title', 'Pago Exitoso')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h2 class="text-success mb-3">¡Pago Exitoso!</h2>
                    <p class="lead">Tu pago ha sido procesado correctamente.</p>
                    
                    @if($payment_id)
                        <p><strong>ID de Pago:</strong> {{ $payment_id }}</p>
                    @endif
                    
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
