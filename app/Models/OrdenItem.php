<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{
    protected $fillable = ['orden_id', 'articulo_id', 'cantidad', 'precio_unitario'];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
