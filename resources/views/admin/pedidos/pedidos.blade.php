@extends('index')
@section('title', 'pedidos')
@section('contenido')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h2>Gestión de Pedidos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->user->name}}</td>
                    <td>{{$pedido->total}}</td>
                    <td>{{$pedido->created_at->format('d-m-Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection