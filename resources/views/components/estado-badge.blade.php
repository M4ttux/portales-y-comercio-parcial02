@php
    $estado = strtolower($estado);
    $traducciones = [
        'approved' => 'Aprobado',
        'pending' => 'Pendiente',
        'in_process' => 'En proceso',
        'rejected' => 'Rechazado',
        'cancelled' => 'Cancelado',
        'refunded' => 'Reembolsado',
    ];
    $clases = [
        'approved' => 'success',
        'pending' => 'warning',
        'in_process' => 'warning',
        'rejected' => 'danger',
        'cancelled' => 'danger',
        'refunded' => 'danger',
    ];
    $clase = $clases[$estado] ?? 'secondary';
    $texto = $traducciones[$estado] ?? ucfirst($estado);
@endphp

<span class="badge bg-{{ $clase }}">{{ $texto }}</span>
