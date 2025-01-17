<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartas = Carta::all();
        //if(session()->has('carrito')) dd(session('carrito'));
        return view('frontend.catalogo', compact('cartas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(Auth::user()->role == 'admin'){
            return view('admin.cartas.formulario_cartas');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $carta = new Carta();
        $carta->nombre = $request->nombre;
        $carta->precio = $request->precio;
        $carta->tipo = $request->tipo;
        $carta->rareza = $request->rareza;
        $carta->stock = $request->stock;
        $carta->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Carta $carta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carta $carta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carta $carta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carta $carta)
    {
        //
    }
}
