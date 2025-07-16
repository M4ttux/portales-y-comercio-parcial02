<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\OrdenItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResumenCompra;

class MercadoPagoController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('📩 Webhook recibido', ['payload' => $request->all()]);

        $body = $request->all();
        Log::info('📦 Tipo de evento recibido', [
            'type' => $body['type'] ?? 'no definido',
            'action' => $body['action'] ?? 'sin action',
            'data_id' => $body['data']['id'] ?? $body['data_id'] ?? $body['id'] ?? 'no disponible',
        ]);

        if (!isset($body['type']) || $body['type'] !== 'payment') {
            Log::warning('🔸 Webhook ignorado: tipo no es payment');
            return response()->json(['message' => 'Evento ignorado'], 200);
        }

        $paymentId = $body['data']['id']
            ?? $body['data_id']
            ?? $body['id']
            ?? null;

        if (!$paymentId) {
            Log::error('❌ Webhook sin payment_id');
            return response()->json(['message' => 'Falta payment_id'], 400);
        }

        try {
            if ($paymentId == '123456') {
                Log::info("🔎 ID de prueba recibido. Webhook ignorado.");
                return response()->json(['message' => 'ID de prueba ignorado'], 200);
            }

            MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
            $client = new PaymentClient();

            $options = new RequestOptions();
            $options->setCustomHeaders([
                'x-expand-fields' => 'metadata'
            ]);

            $payment = $client->get($paymentId, $options);

            Log::info('💳 Pago recibido', [
                'id' => $payment->id,
                'status' => $payment->status,
                'email' => $payment->payer->email
            ]);

            if (Orden::where('payment_id', $payment->id)->exists()) {
                Log::info("🔁 Orden ya existe para payment_id {$payment->id}");
                return response()->json(['message' => 'Orden ya creada'], 200);
            }

            $user = null;
            // PRIMERO buscar por metadata.user_id (usuario autenticado)
            if (isset($payment->metadata->user_id)) {
                $user = User::find($payment->metadata->user_id);
                Log::info("🔎 Usuario encontrado por metadata.user_id: " . $payment->metadata->user_id);
            }

            // SOLO si no se encuentra por metadata, buscar por email como fallback
            if (!$user) {
                $email = $payment->payer->email ?? null;
                if ($email) {
                    $user = User::where('email', $email)->first();
                    Log::info("🔎 Usuario buscado por email como fallback: " . $email);
                }
            }

            if (!$user) {
                Log::warning("⚠️ No se pudo asignar usuario (ni por email ni por metadata)");
                return response()->json(['message' => 'Usuario no encontrado'], 200);
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
                'estado' => $payment->status,
                'payment_id' => $payment->id,
                'fecha_compra' => now(),
            ]);

            // Guardar los ítems SIEMPRE
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

            if ($payment->status === 'approved') {
                $carrito->items()->delete();
                $orden->load('items.articulo', 'usuario');
                Mail::to($user->email)->send(new ResumenCompra($orden));
                Log::info("✅ Orden aprobada creada, mail enviado y carrito vaciado para user_id {$user->id}");
            } elseif (in_array($payment->status, ['pending', 'in_process'])) {
                $orden->load('items.articulo', 'usuario');
                Mail::to($user->email)->send(new ResumenCompra($orden));
                Log::info("🕐 Orden en estado '{$payment->status}' creada y mail enviado para user_id {$user->id}");
            } elseif (in_array($payment->status, ['rejected', 'cancelled'])) {
                $orden->load('items.articulo', 'usuario');
                Mail::to($user->email)->send(new ResumenCompra($orden));
                Log::info("❌ Orden con error '{$payment->status}' creada y mail enviado para user_id {$user->id}");
            } else {
                Log::info("🕐 Orden creada en estado '{$payment->status}' para user_id {$user->id}");
            }

            return response()->json(['message' => 'Orden registrada con estado ' . $payment->status], 200);
        } catch (\Exception $e) {
            Log::error("❌ Error en webhook: " . $e->getMessage());
            return response()->json(['message' => 'Error interno'], 500);
        }
    }
}
