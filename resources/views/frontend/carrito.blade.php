@extends('index')
@section('title', 'Carrito')
@section('contenido')
    <div class="container">
        <h2>Carrito de la Compra</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('carrito'))
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <!-- Las cartas del carrito se generarán dinámicamente -->
                @php
                    $total = 0;
                @endphp
                @foreach(session('carrito') as $carta)
                    @php
                        $total += ($carta['precio_carta'] * $carta['cantidad']);
                    @endphp
                    <tr>
                        <td>{{$carta['nombre_carta']}}</td>
                        <td>{{$carta['cantidad']}}</td>
                        <td>{{$carta['precio_carta']}}</td>
                        <td>{{$carta['precio_carta'] * $carta['cantidad']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
        <div class="total">
            <p>Total: <span id="total">{{$total}}</span> euros</p>
        </div>
        <form action="{{route('carrito.store')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit">Confirmar Pedido</button>
        </form>
        <form action="{{route('carrito.eliminarCarrito')}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Carrito</button>
        </form>
        @else
            <p>No hay cartas en el carrito</p>
        @endif
    </div>

@endsection
