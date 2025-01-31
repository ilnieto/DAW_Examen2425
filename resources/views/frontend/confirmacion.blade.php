@extends('index')
@section('title', 'Confirmación de Pedido')
@section('contenido')
    <div class="container">
        <h2>¡Pedido Confirmado!</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p>Gracias por tu compra.</p>
        <form action="{{route('pdf')}}" method="POST">
            @csrf
            @method('GET')
            <input type="hidden" name="pedido" value="{{session('pedido')}}">
            <button type="submit" class="btn btn-primary">Ver factura</button>
        </form>
        <a href="{{ route('catalogo') }}" class="btn btn-primary">Volver al catálogo</a>
    </div>
@endsection
