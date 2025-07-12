<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Talles;
use App\Models\Categoria;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;


class ArticuloController extends Controller
{

    public function index(Request $request)
    {
        $query = Articulo::with(['talles', 'categorias']);

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categoria', $request->categoria);
            });
        }

        // Filtro por talle
        if ($request->filled('talle')) {
            $query->whereHas('talles', function ($q) use ($request) {
                $q->where('talle', $request->talle);
            });
        }

        // Filtro por precio máximo
        if ($request->filled('precio')) {
            $query->where('precio', '<=', $request->precio);
        }

        $filteredArticulos = $query->get();
        $talles = Talles::all();
        $categorias = Categoria::all();

        return view('articulos.index', [
            'articulos' => $filteredArticulos,
            'talles' => $talles,
            'categorias' => $categorias,
        ]);
    }

    public function detalle($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.detalle', compact('articulo'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $data = [
            'nombre' => $input['nombre'],
            'descripcion' => $input['descripcion'],
            'precio' => $input['precio'],
            'fecha_creacion' => $input['fecha_creacion'],
            'categoria_id' => $input['categoria_id'],
            'cantidad' => $input['cantidad'],
        ];

        if ($request->hasFile('imagen')) {
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/productos', $filename, 'public');
            $data['imagen'] = $filename;
        }

        if ($request->hasFile('imagen_hover')) {
            $filenameHover = time() . '_hover.' . $request->imagen_hover->extension();
            $request->file('imagen_hover')->storeAs('images/productos', $filenameHover, 'public');
            $data['imagen_hover'] = $filenameHover;
        }

        $articulo = Articulo::create($data);

        // Asignar talles múltiples
        if ($request->filled('talles')) {
            $articulo->talles()->attach($request->input('talles'));
        }

        return redirect()->route('admin.section', ['seccion' => 'articulos'])
            ->with('feedback.message', 'Producto agregado correctamente.')
            ->with('feedback.type', 'success');
    }



    public function destroy($id)
    {
        try {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();

            if ($articulo->imagen) {
                Storage::disk('public')->delete('images/productos/' . $articulo->imagen);
            }
            if ($articulo->imagen_hover) {
                Storage::disk('public')->delete('images/productos/' . $articulo->imagen_hover);
            }

            return redirect()->route('admin.section', ['seccion' => 'articulos'])
                ->with('feedback.message', 'Artículo eliminado correctamente')
                ->with('feedback.type', 'success');
        } catch (QueryException $e) {
            $mensaje = $e->getCode() === '23000'
                ? 'No se puede eliminar este artículo porque está relacionado con otros registros.'
                : 'Error al intentar eliminar el artículo.';

            return redirect()->route('admin.section', ['seccion' => 'articulos'])
                ->with('feedback.message', $mensaje)
                ->with('feedback.type', 'danger');
        }
    }

    public function update(Request $request, $id)
    {
        $articulo = Articulo::findOrFail($id);

        $data = $request->only([
            'nombre',
            'descripcion',
            'precio',
            'categoria_id',
            'cantidad',
            'fecha_creacion'
        ]);

        if ($request->hasFile('imagen')) {
            if ($articulo->imagen) {
                Storage::disk('public')->delete('images/productos/' . $articulo->imagen);
            }
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->file('imagen')->storeAs('images/productos', $filename, 'public');
            $data['imagen'] = $filename;
        }

        if ($request->hasFile('imagen_hover')) {
            if ($articulo->imagen_hover) {
                Storage::disk('public')->delete('images/productos/' . $articulo->imagen_hover);
            }
            $filenameHover = time() . '_hover.' . $request->imagen_hover->extension();
            $request->file('imagen_hover')->storeAs('images/productos', $filenameHover, 'public');
            $data['imagen_hover'] = $filenameHover;
        }

        $articulo->update($data);

        // Actualizar talles asociados
        if ($request->filled('talles')) {
            $articulo->talles()->sync($request->input('talles'));
        } else {
            $articulo->talles()->detach(); // Si no se seleccionaron talles
        }

        return redirect()->route('admin.section', ['seccion' => 'articulos'])
            ->with('feedback.message', 'Producto actualizado correctamente.')
            ->with('feedback.type', 'success');
    }
}
