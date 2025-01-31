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
        
        if(Auth::user()->role == 'admin'){
            $cartas = Carta::all();
            return view('admin.cartas.cartas', compact('cartas'));
        }else{
            $cartas = Carta::where('stock', '>', 0)->get();
            return view('frontend.catalogo', compact('cartas'));
        }
        
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
        return redirect()->route('admin_cartas')->with('success', 'Carta añadida correctamente');
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
        if(Auth::user()->role == 'admin'){
            return view('admin.cartas.formulario_cartas', compact('carta'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carta $carta)
    {
        $carta->nombre = $request->nombre;
        $carta->precio = $request->precio;
        $carta->tipo = $request->tipo;
        $carta->rareza = $request->rareza;
        $carta->stock = $request->stock;
        $carta->update();
        return redirect()->route('admin_cartas')->with('success', 'Carta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carta $carta)
    {
        try {
            $carta->delete();
            return redirect()->route('cartas.index')->with('success', 'Carta eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('cartas.index')->with('error', 'No se puede eliminar esta carta porque está asociada a pedidos existentes');
        }
    }
}
