<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    // Habilitamos asignación masiva para estos campos
    protected $fillable = [
        'user_id',
        'activo',
    ];

    // Relación: un carrito pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación: un carrito tiene muchos items
    public function items()
    {
        return $this->hasMany(CarritoItem::class);
    }
}
