<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir carta</title>
     <link rel="stylesheet" href="../../../assets/main.css">
</head>
<body>
    <header class="header-admin">
        <h1>Tienda de Cartas Mágicas</h1>
        <nav>
            <ul>
                <li><a href="">Cartas</a></li>
                <li><a href="">Pedidos</a></li>
                <li><a href="">Cerrar Sesión (Iván)</a></li>
         
            </ul>
        </nav>
    </header>
    <main class="formulario-carta">
        <div class="container">
            <h2>Añadir Nueva Carta</h2>
            <form action="/admin/cartas/crear" method="POST">
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
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de Cartas Mágicas</p>
    </footer>
</body>
</html>
