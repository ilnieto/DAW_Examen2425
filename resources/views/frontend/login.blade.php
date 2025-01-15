<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
    <main class="login">
        <div class="container">
            <h2>Login Administrador</h2>
            <form action="{{route('login')}}" method="POST">

                @csrf


                <p>
                    @if (session('error'))
                        {{session('error')}}
                    @endif
                </p>
                
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Iniciar Sesión</button>

            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de Cartas Mágicas - 2 DAW</p>
    </footer>
</body>
</html>
