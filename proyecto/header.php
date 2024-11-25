<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetRescue - Encuentra a tus mascotas</title>
    <link rel="stylesheet" href="estilos/index.css">
    <script src="js/script.js"></script>
</head>

<body>

<header>
    <div class="logo">
        <a href="index.php">
            <img src="imagenes/logoPetRescue.png" alt="Logo de PetRescue">
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="mascotas_perdidas.php">Mascotas Perdidas</a></li>
            <li><a href="mapa.php">Mapa</a></li>
        </ul>
    </nav>
    <div class="user-actions">
        <a href="formulario_inicio_sesion.php" id="loginButton"><img src="imagenes/iniciosesion.png" alt="Iniciar Sesión" style="width: 40px; height: auto;"></a>
    </div>

    <div id="loginForm" style="display: none;">
        <form>
            Usuario: <input type="text" name="username"><br>
            Contraseña: <input type="password" name="password"><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</header>
