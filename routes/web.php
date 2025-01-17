<?php

use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Models\User;

Route::get('/', [LoginController::class, 'showLogin']);

Route::get('/admin', function() {
    return view('admin.cartas.cartas');
})->middleware(['auth','role:admin'])->name('admin_cartas');

Route::get( '/cliente', [CartaController::class, 'index'])->middleware(['auth'])->name('catalogo');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get( '/logout', [LoginController::class, 'logout']);

Route::get('/users', function(){
    $users = User::all();
    return response()->json($users, 200);
});

Route::post('carrito', [PedidoController::class, 'anadirCarrito'])->name('carrito');

Route::resource('cartas', CartaController::class);
