<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class MercadoPagoController extends Controller
{
    public function paymentConfirmation(Request $request)
    {
        Log::info(collect($request->all()));

    }
}

