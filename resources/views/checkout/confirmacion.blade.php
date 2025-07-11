@extends('layout.app')
@section('title', 'Compra Confirmada')

@section('content')
<div class="container py-5 text-center">
    <i class="fas fa-check-circle text-success display-1 mb-4"></i>
    <h2 class="mb-3">¡Gracias por tu compra!</h2>
    <p class="lead mb-4">Tu orden fue registrada correctamente. En breve recibirás un resumen en tu correo electrónico.</p>
    <a href="{{ route('articulos.index') }}" class="btn btn-outline-primary">
        <i class="fas fa-store me-1"></i> Volver a la tienda
    </a>
</div>
@endsection
