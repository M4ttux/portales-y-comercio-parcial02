<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'categoria_id';
    protected $fillable = [
        'categoria',
    ];

    // Relacion de uno a muchos con la tabla articulos
    public function articulos() {
        return $this->hasMany(Articulo::class, 'categoria_id', 'categoria_id');
    }
}

