<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Orden;
use App\Models\OrdenItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResumenCompra;

class CheckoutController extends Controller
{
    // Mostrar vista previa del resumen de compra
    public function index()
    {
        $user = Auth::user();
        $carrito = $user->carrito()->where('activo', true)->first();

        if (!$carrito || $carrito->items()->count() === 0) {
            return redirect()
                ->route('carrito.index')
                ->with('feedback.message', 'Tu carrito está vacío')
                ->with('feedback.type', 'warning');
        }

        $items = $carrito->items()->with('articulo')->get();
        $total = $items->sum(fn($item) => $item->articulo->precio * $item->cantidad);

        return view('checkout.index', compact('items', 'total'));
    }

    // Procesar compra y registrar orden
    public function store()
    {
        $user = Auth::user();
        $carrito = $user->carrito()->where('activo', true)->first();

        if (!$carrito || $carrito->items()->count() === 0) {
            return redirect()
                ->route('carrito.index')
                ->with('feedback.message', 'Tu carrito está vacío')
                ->with('feedback.type', 'warning');
        }

        $items = $carrito->items()->with('articulo')->get();
        $total = $items->sum(fn($item) => $item->articulo->precio * $item->cantidad);

        // Crear la orden
        $orden = Orden::create([
            'user_id' => $user->id,
            'total' => $total,
            'estado' => 'confirmada',
            'fecha_compra' => now(),
        ]);

        // Registrar cada item
        $ordenItemsData = $items->map(function ($item) use ($orden) {
            return [
                'orden_id' => $orden->id,
                'articulo_id' => $item->articulo->id,
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->articulo->precio,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        OrdenItem::insert($ordenItemsData); // Inserción en lote = mejor rendimiento

        // Cargar relaciones para el mail
        $orden->load('items.articulo', 'usuario');

        // Enviar resumen
        Mail::to($user->email)->send(new ResumenCompra($orden));

        // Vaciar carrito
        $carrito->items()->delete();

        return redirect()->route('checkout.confirmacion');
    }

    // Vista de confirmación
    public function confirmacion()
    {
        return view('checkout.confirmacion');
    }
}
