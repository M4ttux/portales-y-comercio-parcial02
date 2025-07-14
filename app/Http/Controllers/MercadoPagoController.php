<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\OrdenItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;

class MercadoPagoController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('📩 Webhook recibido', ['payload' => $request->all()]);

        $body = $request->all();

        if (!isset($body['type']) || $body['type'] !== 'payment') {
            Log::warning('🔸 Webhook ignorado: tipo no es payment');
            return response()->json(['message' => 'Evento ignorado'], 200);
        }

        $paymentId = $body['data']['id'] ?? null;

        if (!$paymentId) {
            Log::error('❌ Webhook sin payment_id');
            return response()->json(['message' => 'Falta payment_id'], 400);
        }

        try {
            MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
            $client = new PaymentClient();

            if ($paymentId == '123456') {
                Log::info("🔎 ID de prueba recibido. Webhook ignorado.");
                return response()->json(['message' => 'ID de prueba ignorado'], 200);
            }


            $payment = $client->get($paymentId);
            Log::info('💳 Pago recibido', [
                'id' => $payment->id,
                'status' => $payment->status,
                'email' => $payment->payer->email
            ]);

            if ($payment->status !== 'approved') {
                return response()->json(['message' => 'Pago no aprobado'], 200);
            }

            $user = User::where('email', $payment->payer->email)->first();

            if (!$user) {
                Log::warning("⚠️ Usuario no encontrado para email " . $payment->payer->email);
                return response()->json(['message' => 'Usuario no encontrado'], 200);
            }

            // Verificar orden duplicada
            if (Orden::where('user_id', $user->id)
                ->where('estado', 'confirmada')
                ->whereDate('created_at', now())
                ->exists()
            ) {
                return response()->json(['message' => 'Orden ya creada'], 200);
            }

            $carrito = $user->carrito()->where('activo', true)->first();

            if (!$carrito || $carrito->items()->count() === 0) {
                Log::warning("🛒 Carrito vacío para user_id {$user->id}");
                return response()->json(['message' => 'Carrito vacío'], 200);
            }

            $items = $carrito->items()->with('articulo')->get();
            $total = $items->sum(fn($item) => $item->articulo->precio * $item->cantidad);

            $orden = Orden::create([
                'user_id' => $user->id,
                'total' => $total,
                'estado' => 'confirmada',
                'fecha_compra' => now(),
            ]);

            $ordenItems = $items->map(function ($item) use ($orden) {
                return [
                    'orden_id' => $orden->id,
                    'articulo_id' => $item->articulo->id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->articulo->precio,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            OrdenItem::insert($ordenItems);
            $carrito->items()->delete();

            Log::info("✅ Orden creada exitosamente desde webhook para user_id {$user->id}");

            return response()->json(['message' => 'Orden creada con éxito'], 200);
        } catch (\Exception $e) {
            Log::error("❌ Error en webhook: " . $e->getMessage());
            return response()->json(['message' => 'Error interno'], 500);
        }
    }
}
