<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Talles extends Model
{
    use HasFactory;
    protected $table = 'talles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'talle',
    ];

    // Relacion de muchos a muchos con la tabla articulos
    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'articulo_talle', 'talle_id', 'articulo_id');
    }
}
