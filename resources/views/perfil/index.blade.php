@extends('layout.app')
@section('title', 'Mi Perfil')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"><i class="bi bi-person-circle me-2"></i>Perfil de {{ $user->name }}</h2>

    <div class="mb-5">
        <p><strong>Nombre:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <hr>

    <h4 class="mb-3"><i class="fas fa-receipt me-2"></i>Mis compras</h4>

    @if($ordenes->isEmpty())
        <p class="text-muted">No has realizado ninguna compra aún.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th># Orden</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Artículos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                        <tr>
                            <td>{{ $orden->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($orden->fecha_compra)->format('d/m/Y H:i') }}</td>
                            <td>${{ number_format($orden->total, 2) }}</td>
                            <td>{{ ucfirst($orden->estado) }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($orden->items as $item)
                                        <li>{{ $item->articulo->nombre }} x {{ $item->cantidad }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
