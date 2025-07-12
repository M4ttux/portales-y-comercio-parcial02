<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        Categoria::create([
            'categoria' => $request->input('nombre')
        ]);

        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría creada correctamente')
            ->with('feedback.type', 'success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        Categoria::findOrFail($id)->update([
            'categoria' => $request->input('nombre')
        ]);

        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría actualizada correctamente')
            ->with('feedback.type', 'success');
    }

    public function destroy($id)
    {
        try {
            Categoria::findOrFail($id)->delete();

            return redirect()
                ->route('admin.section', ['seccion' => 'categorias'])
                ->with('feedback.message', 'Categoría eliminada correctamente')
                ->with('feedback.type', 'success');

        } catch (QueryException $e) {
            $mensaje = $e->getCode() === '23000'
                ? 'No se puede eliminar esta categoría porque está relacionada con uno o más artículos.'
                : 'Error al intentar eliminar la categoría.';

            return redirect()
                ->route('admin.section', ['seccion' => 'categorias'])
                ->with('feedback.message', $mensaje)
                ->with('feedback.type', 'danger');
        }
    }
}
