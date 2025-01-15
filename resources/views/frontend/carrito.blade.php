<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
  <link rel="stylesheet" href="../../assets/main.css">
  <!-- <link rel="stylesheet" href="./assets/main.css">  SOLO CON MVC ACTIVO -->
</head>
<body>
    <header>
        <h1>Tienda de Cartas Mágicas</h1>
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
       
    </header>
    <main class="carrito">
        <div class="container">
            <h2>Carrito de la Compra</h2>
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
                </tbody>
            </table>
            <div class="total">
                <p>Total: <span id="total">0.00</span> euros</p>
            </div>
            <form action="" method="POST">
                <button type="submit">Confirmar Pedido</button>
            </form>
            <form action="" method="POST">
                <button type="submit">Eliminar Carrito</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de Cartas Mágicas</p>
    </footer>
</body>
</html>
