<?php

use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CatalogoController;
use App\Models\User;

Route::get('/', [LoginController::class, 'showLogin']);

//Route::get('/admin', function() {
//    return view('admin.cartas.cartas');
//}, [CartaController::class, 'index'])->middleware(['auth','role:admin'])->name('admin_cartas');

Route::get( '/cliente', [CartaController::class, 'index'])->middleware(['auth'])->name('catalogo');

Route::get( '/admin', [CartaController::class, 'index'])->middleware(['auth'], 'role:admin')->name('admin_cartas');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get( '/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', function(){
    $users = User::all();
    return response()->json($users, 200);
});

Route::get('/pedidos', [PedidoController::class, 'index'])->middleware(['auth'], 'role:admin')->name('pedidos');

Route::get('/carrito', [CarritoController::class, 'index'])->name('ver_carrito');

Route::put('/carrito/anadir', [CarritoController::class, 'anadirCarrito'])->name('carrito.anadir');

Route::delete('/carrito/eliminar', [CarritoController::class, 'eliminarCarrito'])->name('carrito.eliminarCarrito');

Route::post('/carrito/store', [CarritoController::class, 'store'])->name('carrito.store');

Route::get('/carrito/confirmacion', [CarritoController::class, 'confirmarPedido'])->name('carrito.confirmarPedido');

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');

Route::resource('cartas', CartaController::class);

Route::resource('carrito', CarritoController::class);

Route::get('/pdf', [CarritoController::class, 'pdf'])->name('pdf');


//Route::get('editar', CartaController::class)->middleware(['auth'], 'role:admin')->name('editar_cartas');
