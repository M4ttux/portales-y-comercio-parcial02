<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    // Listado general de noticias (admin)
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }

    // Crear nueva noticia
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/noticias', $filename, 'public');
            $data['imagen'] = $filename;
        }

        Noticia::create($data);

        return redirect()
            ->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia creada correctamente')
            ->with('feedback.type', 'success');
    }

    // Eliminar noticia
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        if ($noticia->imagen) {
            Storage::disk('public')->delete('images/noticias/' . $noticia->imagen);
        }

        $noticia->delete();

        return redirect()
            ->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia eliminada correctamente')
            ->with('feedback.type', 'success');
    }

    // Actualizar noticia
    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior
            if ($noticia->imagen) {
                Storage::disk('public')->delete('images/noticias/' . $noticia->imagen);
            }

            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/noticias', $filename, 'public');
            $data['imagen'] = $filename;
        }

        $noticia->update($data);

        return redirect()
            ->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia actualizada correctamente')
            ->with('feedback.type', 'success');
    }

    // Noticias públicas (home)
    public function publicas()
    {
        $noticias = Noticia::latest()->take(3)->get();
        return view('home', compact('noticias'));
    }
}
