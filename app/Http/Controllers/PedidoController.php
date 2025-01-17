<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Carta;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function anadirCarrito(Request $request)
    {
      
        $carrito = $request->session()->get('carrito', []);
        //guardar en carrito id, nombre, precio de carta y cantidad elegida
        $carta = Carta::findOrFail($request->carta_id);
        $datosCarrito = [
            'id_carta' => $carta->id,
            'nombre_carta' => $carta->nombre,
            'precio_carta'=> $carta->precio,
            'cantidad' => $request->cantidad

        ];
        //añadir lo que llega al carrito en sesion
        array_push($carrito, $datosCarrito);

        $request->session()->put('carrito', $carrito);
        return redirect()->route('catalogo');
    }
}
