<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }
    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->contenido = $request->input('contenido');

        if ($request->hasFile('imagen')) {
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/noticias', $filename, 'public');
            $noticia->imagen = $filename;
        }

        $noticia->save();
        return redirect()->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia creada correctamente')
            ->with('feedback.type', 'success');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        if ($noticia->imagen) {
            Storage::disk('public')->delete('images/noticias/' . $noticia->imagen);
        }

        return redirect()->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia eliminada correctamente')
            ->with('feedback.type', 'success');
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->titulo = $request->input('titulo');
        $noticia->contenido = $request->input('contenido');

        if ($request->hasFile('imagen')) {
            if ($noticia->imagen) {
                Storage::disk('public')->delete('images/noticias/' . $noticia->imagen);
            }
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/noticias', $filename, 'public');
            $noticia->imagen = $filename;
        }

        $noticia->save();
        return redirect()->route('admin.section', ['seccion' => 'noticias'])
            ->with('feedback.message', 'Noticia actualizada correctamente')
            ->with('feedback.type', 'success');
    }

    public function publicas()
    {
        $noticias = Noticia::latest()->take(3)->get();
        return view('home', compact('noticias'));
    }
}
