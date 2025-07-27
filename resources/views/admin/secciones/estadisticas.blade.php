@extends('admin.index')

@section('admin-section')
    <div class="container my-4">
        <h3 class="text-center mb-4">📊 Productos más comprados</h3>

                {{-- Tabla de productos más vendidos --}}
        <h4 class="mt-4 mb-3">Top 3 productos más vendidos</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Total Vendido</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productosMasComprados as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->total_vendidos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
        {{-- Tabla resumen --}}
        <h4 class="mt-4 mb-3">Estadisticas Generales</h4>
        <table class="table table-bordered mb-5">
            <thead class="table-light">
                <tr>
                    <th>Estadística</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>💰 Total facturado</td>
                    <td><strong>${{ number_format($totalFacturado, 2, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <td>🛒 Total de productos vendidos</td>
                    <td><strong>{{ $totalProductosVendidos }}</strong></td>
                </tr>
                @if($topCliente)
                    <tr>
                        <td>🏆 Cliente que más gastó</td>
                        <td>
                            <strong>{{ $topCliente->name }}</strong><br>
                            (Total: ${{ number_format($topCliente->total, 2, ',', '.') }})
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
