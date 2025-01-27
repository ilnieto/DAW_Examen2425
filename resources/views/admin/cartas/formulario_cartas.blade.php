@extends('index')
@section('title', 'Formulario cartas')
@section('contenido')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        @isset($carta)
        <h2>Modificar Carta</h2>
            <form action="{{route('cartas.update', $carta)}}" method="POST">
                @csrf
                @method('PUT')
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" value="{{$carta->nombre}}" name="nombre" placeholder="Ej: Dragón de Fuego" required>
                
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="criatura" @if($carta->tipo == 'criatura') selected @endif>Criatura</option>
                    <option value="hechizo" @if($carta->tipo == 'hechizo') selected @endif>Hechizo</option>
                    <option value="artefacto" @if($carta->tipo == 'artefacto') selected @endif>Artefacto</option>
                </select>
                
                <label for="rareza">Rareza:</label>
                <select id="rareza" name="rareza" required>
                    <option value="común" @if($carta->rareza == 'común') selected @endif>Común</option>
                    <option value="rara" @if($carta->rareza == 'rara') selected @endif>Rara</option>
                    <option value="legendaria" @if($carta->rareza == 'legendaria') selected @endif>Legendaria</option>
                </select>
                
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Ej: 500" min="0" value="{{$carta->precio}}" required>
                
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" placeholder="Ej: 10" min="0" value="{{$carta->stock}}"  required>
                
                <button type="submit">Modificar Carta</button>
            </form>
        @else
            <h2>Añadir Nueva Carta</h2>
            <form action="{{route('cartas.store')}}" method="POST">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Dragón de Fuego" required>
                
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="criatura">Criatura</option>
                    <option value="hechizo">Hechizo</option>
                    <option value="artefacto">Artefacto</option>
                </select>
                
                <label for="rareza">Rareza:</label>
                <select id="rareza" name="rareza" required>
                    <option value="común">Común</option>
                    <option value="rara">Rara</option>
                    <option value="legendaria">Legendaria</option>
                </select>
                
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Ej: 500" min="0" required>
                
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" placeholder="Ej: 10" min="0"  required>
                
                <button type="submit">Añadir Carta</button>
            </form>
        @endif
    </div>
@endsection
