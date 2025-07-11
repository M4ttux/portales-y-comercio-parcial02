<?php

// Usmos el controlador de la vista HOME
use App\Http\Controllers\HomeController;

// Usamos el Facade de Laravel para las rutas
use Illuminate\Support\Facades\Route;

// Usamos el controlador de la vista CONTACTO
use App\Http\Controllers\ContactoController;
// Usamos el controlador de la vista ARTICULOS
use App\Http\Controllers\ArticuloController;
// Usamos el controlador de la vista CATEGORIAS
use App\Http\Controllers\CategoriaController;
// Usamos el controlador de la vista TALLES
use App\Http\Controllers\TalleController;
// Usamos el controlador de la vista AUTH
use App\Http\Controllers\AuthController;
// Usamos el controlador de la vista ADMIN
use App\Http\Controllers\AdminController;
//Usamos el controlador para la vista Alumno
use App\Http\Controllers\AlumnoController;
// Usamos el middleware para verificar si el usuario es admin
use App\Http\Middleware\IsAdmin;
//Usamos el controlador para la las Noticias de river
use App\Http\Controllers\NoticiaController;
// Usamos el controlador para los usuarios
use App\Http\Controllers\UserController;


// LLamando al Metodo Index
// vista home
Route::get('/', [HomeController::class, 'index'])->name('home');


// Listado de articulos
Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');

//Listado de articulos por Id (DETALLE DE ARTICULO)
//Correxion de la ruta ( /{id})
Route::get('/articulos/{id}', [ArticuloController::class, 'detalle'])
    ->name('articulos.detalle')
    ->whereNumber('id');


//Ruta para vista de contacto
Route::get('/contacto', [ContactoController::class, 'contacto'])->name('contacto');
// Ruta para procesar el formulario de contacto
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');

// Ruta para mostrar la vista alumno
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumno.index');

// Ruta para mostrar la vista de noticias
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
// Listado de rutas protegidas para roles de admin
// Middleware para verificar si el usuario es admin 
// Middleware esta dentro de App-> Http-> Middleware->IsAdmin   
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


    Route::get('/admin/{seccion}', [AdminController::class, 'mostrarSeccion'])->name('admin.section');


    Route::delete('/articulos/{id}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');
    Route::put('/articulos/{id}', [ArticuloController::class, 'update'])->name('articulos.update');
    Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');

    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

    Route::delete('/talles/{id}', [TalleController::class, 'destroy'])->name('talles.destroy');
    Route::put('/talles/{id}', [TalleController::class, 'update'])->name('talles.update');
    Route::post('/talles', [TalleController::class, 'store'])->name('talles.store');

    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');

    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
});

// Rutas para la autenticación

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');

// Ruta para procesar el registro
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

// Ruta para Deslogearse
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

use App\Http\Controllers\CarritoController;

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito', [CarritoController::class, 'store'])->name('carrito.store');
    Route::put('/carrito/{id}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
});

use App\Http\Controllers\CheckoutController;

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/confirmacion', [CheckoutController::class, 'confirmacion'])->name('checkout.confirmacion');
});


use App\Http\Controllers\PerfilController;

Route::middleware(['auth'])->get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
