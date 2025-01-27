@extends('index')
@section('title', 'Gestión de Cartas')
@section('contenido')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="container">
    <h2>Gestión de Cartas</h2>
    <a href="{{route('cartas.create')}}" class="btn">Añadir Nueva Carta</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Rareza</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartas as $carta)
                <tr>
                    <td>{{ $carta->id }}</td>
                    <td>{{ $carta->nombre }}</td>
                    <td>{{ $carta->tipo }}</td>
                    <td>{{ $carta->rareza }}</td>
                    <td>{{ $carta->precio }}</td>
                    <td>{{ $carta->stock }}</td>
                    <td>
                        <a href="{{ route('cartas.edit', $carta) }}" class="btn btn-eliminar">Editar</a>
                        <form action="{{ route('cartas.destroy', $carta) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection