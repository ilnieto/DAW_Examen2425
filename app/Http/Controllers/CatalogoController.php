<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $query = Carta::query()->where('stock', '>', 0);

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('rareza')) {
            $query->where('rareza', $request->rareza);
        }

        if ($request->filled('precio')) {
            $query->where('precio', '<=', $request->precio);
        }

        switch ($request->get('orden')) {
            case 'nombre_asc':
                $query->orderBy('nombre', 'asc');
                break;
            case 'nombre_desc':
                $query->orderBy('nombre', 'desc');
                break;
            case 'precio_asc':
                $query->orderBy('precio', 'asc');
                break;
            case 'precio_desc':
                $query->orderBy('precio', 'desc');
                break;
            default:
                $query->orderBy('nombre', 'asc');
        }

        $cartas = $query->get();
        return view('frontend.catalogo', compact('cartas'));
    }
}
?>