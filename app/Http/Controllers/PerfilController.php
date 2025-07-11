<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $ordenes = $user->ordenes()->exists()
            ? $user->ordenes()->with('items.articulo')->latest()->get()
            : collect();

        return view('perfil.index', compact('user', 'ordenes'));
    }
}
