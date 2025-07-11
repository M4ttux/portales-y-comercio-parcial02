@extends('admin.index')

@section('admin-section')
<div class="container mt-4">
    <h3 class="mb-4">Ventas Realizadas</h3>

    @if($ordenes->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                        <tr>
                            <td>{{ $orden->id }}</td>
                            <td>{{ $orden->usuario->name ?? 'Usuario eliminado' }}</td>
                            <td>{{ \Carbon\Carbon::parse($orden->fecha_compra)->format('d/m/Y H:i') }}</td>
                            <td>${{ number_format($orden->total, 2) }}</td>
                            <td>{{ ucfirst($orden->estado) }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($orden->items as $item)
                                        <li>{{ $item->articulo->nombre ?? 'Artículo eliminado' }} x {{ $item->cantidad }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">Todavía no hay ventas registradas.</p>
    @endif
</div>
@endsection
