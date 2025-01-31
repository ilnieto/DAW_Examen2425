<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Pedido;
use App\Models\DetallePedido;

class CarritoController extends Controller
{
    public function index()
    {
        return view('frontend.carrito');
    }

    public function show()
    {
        //
    }

    public function confirmarPedido()
    {
        if (!session()->has('success')) {
            return redirect()->route('ver_carrito');
        }
        return view('frontend.confirmacion');
    }

    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->user_id = $request->user_id;
        $pedido->total = $request->total;
        $pedido->save();
        
        foreach(session('carrito') as $carrito){
            $detalle = new DetallePedido();
            $detalle->pedido_id = $pedido->id;
            $detalle->carta_id = $carrito['id_carta'];
            $detalle->cantidad = $carrito['cantidad'];
            $detalle->precioUnitario = $carrito['precio_carta'];
            $detalle->precioTotal = $carrito['precio_carta'] * $carrito['cantidad']; 
            $detalle->save();
            $carta = Carta::findOrFail($carrito['id_carta']);
            $carta->stock = $carta->stock - $carrito['cantidad'];
            $carta->save();
        }
        $request->session()->forget('carrito');
        return redirect()->route('carrito.confirmarPedido')->with('success', 'Pedido realizado correctamente')->with('pedido', $pedido->id);
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
        return redirect()->route('catalogo')->with('success', 'Carta añadida al carrito');
    }

    public function eliminarCarrito()
    {
        session()->forget('carrito');
        return redirect()->back()->with('success', 'Carrito eliminado correctamente');
    }

    public function pdf(Request $request)
    {
        $pedido = Pedido::findOrFail($request->pedido);
        return view('plantillaPdf', compact('pedido'));
    }
}