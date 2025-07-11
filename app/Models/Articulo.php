<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articulo extends Model
{
    protected $table = 'articulos';
    /* protected $primaryKey = 'articulo_id'; */

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'imagen_hover',
        'fecha_creacion',
        'categoria_id',
        'cantidad'
    ];

    // Relacion de muchos a muchos con la tabla talles
    public function talles()
    {
        return $this->belongsToMany(Talles::class, 'articulo_talle', 'articulo_id', 'talle_id');
    }



    // Relacion de uno a muchos con la tabla categorias
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
}
