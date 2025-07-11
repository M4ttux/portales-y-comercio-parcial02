<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function store(Request $request) {
        $input = $request->all();
        $categoria = new Categoria();
        $categoria->categoria = $input['nombre'];
        $categoria->save();
        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría creada correctamente')
            ->with('feedback.type', 'success');
    }

    public function destroy($id){
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();

            return redirect()
                ->route('admin.section', ['seccion' => 'categorias'])
                ->with('feedback.message', 'Categoría eliminada correctamente')
                ->with('feedback.type', 'success');

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()
                    ->route('admin.section', ['seccion' => 'categorias'])
                    ->with('feedback.message', 'No se puede eliminar esta categoría porque está relacionada con uno o más artículos.')
                    ->with('feedback.type', 'danger');
            }

                return redirect()
                    ->route('admin.section', ['seccion' => 'categorias'])
                    ->with('feedback.message', 'Error al intentar eliminar la categoría.')
                    ->with('feedback.type', 'danger');
            }
        }

    public function update(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->categoria = $request->input('nombre');
        $categoria->save();
        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría actualizada correctamente')
            ->with('feedback.type', 'success');
    }
}
