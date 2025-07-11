<div class="modal fade" id="verOrdenesModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="verOrdenesLabel{{ $usuario->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="verOrdenesLabel{{ $usuario->id }}">Órdenes de {{ $usuario->name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                @if ($usuario->ordenes && $usuario->ordenes->count())
                    @foreach ($usuario->ordenes as $orden)
                        <div class="mb-3 border rounded p-3">
                            <strong>Orden #{{ $orden->id }}</strong><br>
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($orden->fecha_compra)->format('d/m/Y H:i') }}<br>
                            <strong>Total:</strong> ${{ number_format($orden->total, 2) }}<br>
                            <strong>Estado:</strong> {{ ucfirst($orden->estado) }}

                            <ul class="list-group mt-2">
                                @foreach ($orden->items as $item)
                                    <li class="list-group-item">
                                        {{ $item->articulo->nombre ?? 'Artículo eliminado' }} x {{ $item->cantidad }}
                                        - ${{ number_format($item->articulo->precio ?? 0, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @else
                    <p>Este usuario no tiene órdenes registradas.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
