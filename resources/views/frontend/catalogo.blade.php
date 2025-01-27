@extends('index')
@section('title', 'Catalogo')
@section('contenido')
    <div class="container">
        <h2>Catálogo de Cartas</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filtros para buscar cartas -->
        <form method="GET" action="{{route('catalogo.index')}}">
            <div class="filtros">

                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="">Todos</option>
                    <option value="criatura" {{ request('tipo') == 'criatura' ? 'selected' : '' }}>Criatura</option>
                    <option value="hechizo" {{ request('tipo') == 'hechizo' ? 'selected' : '' }}>Hechizo</option>
                    <option value="artefacto" {{ request('tipo') == 'artefacto' ? 'selected' : '' }}>Artefacto</option>
                </select>

                <label for="rareza">Rareza:</label>
                <select name="rareza" id="rareza">
                    <option value="">Todas</option>
                    <option value="común" {{ request('rareza') == 'común' ? 'selected' : '' }}>Común</option>
                    <option value="rara" {{ request('rareza') == 'rara' ? 'selected' : '' }}>Rara</option>
                    <option value="legendaria" {{ request('rareza') == 'legendaria' ? 'selected' : '' }}>Legendaria</option>
                </select>

                <label for="precio">Precio máximo:</label>
                <input type="number" name="precio" id="precio" min="0" placeholder="Ej: 500" value="{{ request('precio') }}">

                <!-- Nuevo campo para ordenar -->
                <label for="orden">Ordenar por:</label>
                <select name="orden" id="orden">
                    <option value="nombre_asc" {{ request('orden') == 'nombre_asc' ? 'selected' : '' }}>Nombre (A-Z)</option>
                    <option value="nombre_desc" {{ request('orden') == 'nombre_desc' ? 'selected' : '' }}>Nombre (Z-A)</option>
                    <option value="precio_asc" {{ request('orden') == 'precio_asc' ? 'selected' : '' }}>Precio (menor a mayor)</option>
                    <option value="precio_desc" {{ request('orden') == 'precio_desc' ? 'selected' : '' }}>Precio (mayor a menor)</option>
                </select>

                <button type="submit">Aplicar Filtros</button>
            </div>
        </form>

        <!-- Tabla para listar las cartas -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Rareza</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Añadir al Carrito</th>
                </tr>
            </thead>
                <tbody>

                @foreach ( $cartas as $carta )
                <tr>
                    <td>{{$carta->nombre}}</td>
                    <td>{{$carta->tipo}}</td>
                    <td>{{$carta->rareza}}</td>
                    <td>{{$carta->precio}}</td>
                    <td>{{$carta->stock}}</td>
                    <td>
                        <form action="{{ route('carrito.anadir') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="carta_id" value="{{$carta->id}}">
                            <label for="cantidad_1">Cantidad:</label>
                            <input type="number" id="cantidad_1" name="cantidad" min="1" max="{{$carta->stock}}" value="1" required>
                            <button type="submit">Añadir</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection