<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fectura</title>
    </head>
    <body>
        <h1>Factura del pedido {{$pedido->id}} del usuario {{$pedido->user->name}}</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </tr>
        @php
            $total = 0;
        @endphp

        @foreach($pedido->detalles as $detalle) 
            <tr>
                <td>{{$detalle->carta->nombre}}</td>
                <td>{{$detalle->carta->precio}}</td>
                <td>{{$detalle->cantidad}}</td>
                @php
                    $total += $detalle->carta->precio * $detalle->cantidad;
                @endphp
            </tr>
        @endforeach
        </table>
        <p>Total: {{$total}}</p>
        <a href="{{route('catalogo')}}">Volver al catálogo</a>
    </body>
</html>