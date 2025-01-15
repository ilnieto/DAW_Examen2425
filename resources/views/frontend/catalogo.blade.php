<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Cartas</title>
  <link rel="stylesheet" href="../../assets/main.css">
  <!-- <link rel="stylesheet" href="./assets/main.css">  SOLO CON MVC ACTIVO -->
</head>
<body>

    <header>
        <h1>Tienda de Cartas Mágicas</h1>
        <nav>
            <ul>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="">Cerrar Sesión (Iván)</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="catalogo">
        <div class="container">
            <h2>Catálogo de Cartas</h2>

            <!-- Filtros para buscar cartas -->
            <form method="GET" action="">
                <div class="filtros">

                    <label for="tipo">Tipo:</label>
                    <select name="tipo" id="tipo">
                        <option value="">Todos</option>
                        <option value="criatura">Criatura</option>
                        <option value="hechizo">Hechizo</option>
                        <option value="artefacto">Artefacto</option>
                    </select>

                    <label for="rareza">Rareza:</label>
                    <select name="rareza" id="rareza">
                        <option value="">Todas</option>
                        <option value="común">Común</option>
                        <option value="rara">Rara</option>
                        <option value="legendaria">Legendaria</option>
                    </select>

                    <label for="precio">Precio máximo:</label>
                    <input type="number" name="precio" id="precio" min="0" placeholder="Ej: 500">

                    <!-- Nuevo campo para ordenar -->
                    <label for="orden">Ordenar por:</label>
                    <select name="orden" id="orden">
                        <option value="nombre_asc">Nombre (A-Z)</option>
                        <option value="nombre_desc">Nombre (Z-A)</option>
                        <option value="precio_asc">Precio (menor a mayor)</option>
                        <option value="precio_desc">Precio (mayor a menor)</option>
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
                    <td>{{$carta->habilidad}}</td>
                    <td>{{$carta->rareza}}</td>
                    <td>{{$carta->precio}}</td>
                    <td>{{$carta->stock}}</td>
                    <td>
                        <form action="{{route('carrito')}}" method="POST">

                            @csrf
                            <input type="hidden" name="carta_id" value="{{$carta->id}}">
                            <label for="cantidad_1">Cantidad:</label>
                            <input type="number" id="cantidad_1" name="cantidad" min="1" max="{{$carta->stock}}" value="1" required>
                            <button type="submit">Añadir</button>
                        </form>
                    </td>
                </tr>
                    @endforeach

                    <!-- Ejemplo de una fila de carta -->

                </tbody>
            </table>

        </div>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de Cartas Mágicas</p>
    </footer>
</body>
</html>
