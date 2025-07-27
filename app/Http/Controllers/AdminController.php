<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Articulo;
use App\Models\Talles;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\Noticia;
use App\Models\Orden;

class AdminController extends Controller
{
    public function index()
    {
        $allArticulos = Articulo::with(['talles', 'categorias'])->get();
        $talles = Talles::all();
        $categorias = Categoria::all();
        $usuarios = User::all();
        $mensajes = Mensaje::orderBy('fecha_envio', 'desc')->get();
        $noticias = Noticia::all();

        return view('admin.index', [
            'articulos' => $allArticulos,
            'talles' => $talles,
            'categorias' => $categorias,
            'usuarios' => $usuarios,
            'mensajes' => $mensajes,
            'noticias' => $noticias,
        ]);
    }

     // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'role'  => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.section', ['seccion' => 'usuarios'])
            ->with('feedback.message', 'Usuario actualizado correctamente')
            ->with('feedback.type', 'success');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()
            ->route('admin.section', ['seccion' => 'usuarios'])
            ->with('feedback.message', 'Usuario eliminado correctamente')
            ->with('feedback.type', 'success');
    }



    public function mostrarSeccion($seccion)
    {
        $articulos = Articulo::with(['talles', 'categorias'])->get();
        $talles = Talles::all();
        $categorias = Categoria::all();
        $usuarios = User::all();
        $mensajes = Mensaje::orderBy('fecha_envio', 'desc')->get();
        $noticias = Noticia::all();
        $ordenes = Orden::with(['usuario', 'items.articulo'])->orderBy('fecha_compra', 'desc')->get();

        // Si la sección es "estadisticas", agregamos la lógica específica
        if ($seccion === 'estadisticas') {
            $productosMasComprados = DB::table('orden_items')
                ->join('ordenes', 'orden_items.orden_id', '=', 'ordenes.id')
                ->join('articulos', 'orden_items.articulo_id', '=', 'articulos.id')
                ->where('ordenes.estado', 'approved')
                ->select('articulos.nombre', DB::raw('SUM(orden_items.cantidad) as total_vendidos'))
                ->groupBy('articulos.nombre')
                ->orderByDesc('total_vendidos')
                ->take(3)
                ->get();

            $totalFacturado = DB::table('ordenes')
                ->where('estado', 'approved')
                ->sum('total');

            $totalProductosVendidos = DB::table('orden_items')
                ->join('ordenes', 'orden_items.orden_id', '=', 'ordenes.id')
                ->where('ordenes.estado', 'approved')
                ->sum('orden_items.cantidad');

            $topCliente = DB::table('ordenes')
                ->join('users', 'ordenes.user_id', '=', 'users.id')
                ->where('ordenes.estado', 'approved')
                ->select('users.name', DB::raw('SUM(ordenes.total) as total'))
                ->groupBy('users.name')
                ->orderByDesc('total')
                ->first();

            $detalleProductosVendidos = DB::table('orden_items')
                ->join('ordenes', 'orden_items.orden_id', '=', 'ordenes.id')
                ->join('articulos', 'orden_items.articulo_id', '=', 'articulos.id')
                ->where('ordenes.estado', 'approved')
                ->select('articulos.nombre', DB::raw('SUM(orden_items.cantidad) as cantidad_total'))
                ->groupBy('articulos.nombre')
                ->orderByDesc('cantidad_total')
                ->get();

            return view("admin.secciones.estadisticas", compact(
                'productosMasComprados',
                'totalFacturado',
                'totalProductosVendidos',
                'topCliente',
                'detalleProductosVendidos'
            ));
        }

        // Para el resto de las secciones
        return view("admin.secciones.$seccion", compact(
            'articulos',
            'talles',
            'categorias',
            'usuarios',
            'mensajes',
            'noticias',
            'ordenes'
        ));
    }
}
