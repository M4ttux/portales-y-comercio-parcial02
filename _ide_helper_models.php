<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre_completo
 * @property string $nacimiento
 * @property string $foto
 * @property string|null $github
 * @property string|null $linkedin
 * @property string|null $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereNombreCompleto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereUpdatedAt($value)
 */
	class Alumno extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $articulo_id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $precio
 * @property string|null $imagen
 * @property string|null $imagen_hover
 * @property string|null $fecha_creacion
 * @property int $cantidad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $talle_id
 * @property int $categoria_id
 * @property-read \App\Models\Categoria $categorias
 * @property-read \App\Models\Talles $talles
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereArticuloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereFechaCreacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereImagenHover($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereTalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereUpdatedAt($value)
 */
	class Articulo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarritoItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\User $usuario
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carrito whereUserId($value)
 */
	class Carrito extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $carrito_id
 * @property int $articulo_id
 * @property int $cantidad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Articulo $articulo
 * @property-read \App\Models\Carrito $carrito
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereArticuloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarritoItem whereUpdatedAt($value)
 */
	class CarritoItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $categoria_id
 * @property string $categoria
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereUpdatedAt($value)
 */
	class Categoria extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $compra_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $articulo_id
 * @property int $user_id
 * @property-read \App\Models\Articulo $articulo
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra whereArticuloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra whereCompraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compra whereUserId($value)
 */
	class Compra extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $mensaje
 * @property string|null $fecha_envio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereFechaEnvio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereMensaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensaje whereUpdatedAt($value)
 */
	class Mensaje extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titulo
 * @property string $contenido
 * @property string|null $imagen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereUpdatedAt($value)
 */
	class Noticia extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $talle_id
 * @property string $talle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles whereTalle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles whereTalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Talles whereUpdatedAt($value)
 */
	class Talles extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carrito|null $carrito
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Compra> $compras
 * @property-read int|null $compras_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mensaje> $mensajes
 * @property-read int|null $mensajes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Noticia> $noticias
 * @property-read int|null $noticias_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

