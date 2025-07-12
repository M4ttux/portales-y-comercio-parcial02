<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
    ];

    // Relación con el modelo Usuario
    public function usuario() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
