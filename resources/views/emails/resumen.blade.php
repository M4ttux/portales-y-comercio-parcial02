{{-- resources/views/emails/resumen.blade.php --}}
@component('mail::message')
# @switch($orden->estado)
    @case('approved')
        ¡Gracias por tu compra!
        @break
    @case('pending')
        Tu pago está pendiente
        @break
    @case('in_process')
        Estamos procesando tu pago
        @break
    @default
        Estado de orden: {{ ucfirst($orden->estado) }}
@endswitch

Hola {{ $orden->usuario->name ?? 'Cliente' }},

@switch($orden->estado)
    @case('approved')
        Tu compra fue confirmada exitosamente. A continuación, encontrarás los detalles:
        @break
    @case('pending')
        Recibimos tu orden, pero el pago está pendiente. Te notificaremos cuando se confirme.
        @break
    @case('in_process')
        Estamos verificando tu pago. Te avisaremos una vez finalice el proceso.
        @break
    @default
        Tu orden está en estado **{{ ucfirst($orden->estado) }}**.
@endswitch

---

## 🧾 Resumen de tu orden

<table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
    <thead style="background-color: #f8f9fa;">
        <tr>
            <th align="left" style="padding: 8px; border: 1px solid #dee2e6;">Artículo</th>
            <th align="center" style="padding: 8px; border: 1px solid #dee2e6;">Cantidad</th>
            <th align="right" style="padding: 8px; border: 1px solid #dee2e6;">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orden->items as $item)
            <tr>
                <td style="padding: 8px; border: 1px solid #dee2e6;">
                    {{ $item->articulo->nombre }}
                </td>
                <td align="center" style="padding: 8px; border: 1px solid #dee2e6;">
                    {{ $item->cantidad }}
                </td>
                <td align="right" style="padding: 8px; border: 1px solid #dee2e6;">
                    ${{ number_format($item->precio_unitario * $item->cantidad, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" align="right" style="padding: 8px; border: 1px solid #dee2e6; font-weight: bold;">
                Total pagado:
            </td>
            <td align="right" style="padding: 8px; border: 1px solid #dee2e6; font-weight: bold;">
                ${{ number_format($orden->total, 2) }}
            </td>
        </tr>
    </tfoot>
</table>

---

📅 <strong>Fecha de compra:</strong> {{ $orden->fecha_compra->format('d/m/Y H:i') }}

@if (in_array($orden->estado, ['approved', 'pending', 'in_process']))
    @component('mail::button', ['url' => route('checkout.confirmacion')])
    Ver estado de mi compra
    @endcomponent
@endif


Gracias por confiar en nosotros.  
**{{ config('app.name') }}**
@endcomponent
