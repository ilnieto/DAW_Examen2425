<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido</title>
    <link rel="stylesheet" href="../../assets/main.css">
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
    <main class="confirmacion">
        <div class="container">
            <h2>Pedido Confirmado</h2>
            <p>Gracias por tu compra, <strong><!-- Nombre del usuario --></strong>.</p>
            <p>Hemos generado un PDF con los detalles de tu pedido.</p>
            <a href="/pedidos/pdf/pedido_<id>.pdf" target="_blank">Descargar PDF</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de Cartas Mágicas</p>
    </footer>
</body>
</html>
