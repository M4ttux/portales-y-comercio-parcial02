<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Orden;
use App\Models\OrdenItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResumenCompra;

// MercadoPago
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

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

        // Crear preferencia de Mercado Pago
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        $client = new PreferenceClient();

        $preference_data = [
            'items' => $items->map(function ($item) {
                return [
                    'title' => $item->articulo->nombre,
                    'quantity' => $item->cantidad,
                    'unit_price' => (float) $item->articulo->precio,
                    'currency_id' => 'ARS',
                ];
            })->toArray(),

            "back_urls" => [
                "success" => route("checkout.success"),
                "failure" => route("checkout.failure"),
                "pending" => route("checkout.pending"),
            ],

            "auto_return" => "approved",

            "metadata" => [
                "user_id" => $user->id
            ]
        ];

        try {
            $preference = $client->create($preference_data);
            $publicKey = config('services.mercadopago.public_key');

            return view('checkout.index', compact('items', 'total', 'preference', 'publicKey'));
        } catch (MPApiException $e) {
            return back()->with('feedback.message', 'Error al generar el botón de pago: ' . json_encode($e->getApiResponse()->getContent()))
                ->with('feedback.type', 'danger');
        }
    }

    public function store()
    {
        return redirect()->route('checkout.confirmacion');
    }

    // Vista de éxito
    public function success(Request $request)
    {
        $payment_id = $request->query('payment_id'); // o $request->get('payment_id')
        return view('checkout.success', compact('payment_id'));
    }

    // Vista de error
    public function failure()
    {
        
        return view('checkout.failure');
    }

    // Vista de pendiente
    public function pending()
    {
        return view('checkout.pending');
    }
}
