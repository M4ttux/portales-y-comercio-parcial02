<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/* use App\Models\Carrito; */
use App\Models\Compra;
use App\Models\Mensaje;
use App\Models\Noticia;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

  
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role)
    {
        return $this->role === $role;
    }
    
    public function carrito()
{
    return $this->hasOne(\App\Models\Carrito::class);
}

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }

   
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }
}
