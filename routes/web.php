<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLogin']);

Route::get('/admin', function() {
    return view('admin.cartas.cartas');
})->middleware(['auth','role:admin'])->name('admin_cartas');

Route::get( '/cliente', function() {
    return view('frontend.catalogo');
})->middleware(['auth'])->name('catalogo');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get( '/logout', [LoginController::class, 'logout']);

