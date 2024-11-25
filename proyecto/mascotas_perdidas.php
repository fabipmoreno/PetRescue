<?php
session_start();
include('conexion.php');

// Verificar si el usuario ha iniciado sesión como administrador
$es_administrador = isset($_SESSION['admin']) && $_SESSION['admin'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetRescue - Encuentra a tus mascotas</title>
    <link rel="stylesheet" href="estilos/mascotas_perdidas.css">
</head>

<body>

<?php include 'header.php'; ?>

<main>        
    <h1>Mascotas perdidas</h1>
    <button class="mascota-perdida" onclick="window.location.href='html/cuestionario.html'">¿Has perdido tu mascota?</button>
    <div class="historias">
        <div class="historia">
            <div class="contenido">
                <img src="imagenes/tobi.png" alt="Historia 1">
                <h2>Firulais</h2>
                <p>Firulais se perdió en el parque de El Retiro, en Madrid. Este perrito amigable y juguetón se alejó mientras exploraba el parque con su correa. Si lo encuentran, por favor llamen al +34 111 11 11 11. ¡Estamos desesperados por tenerlo de vuelta en casa!</p>
            </div>
        </div>
        <div class="historia">
            <div class="contenido">
                <img src="imagenes/tana.png" alt="Historia 2">
                <h2>Tana</h2>
                <p>Se perdió en el barrio de Vallecas, Madrid. Tana es una perrita juguetona y cariñosa que se escapó mientras correteaba por el parque. Si la encuentran, por favor llamen al +34 222 22 22 22. ¡La estamos esperando con los brazos abiertos!</p>
            </div>
        </div>
        <div class="historia">
            <div class="contenido">
                <img src="imagenes/rey.png" alt="Historia 3">
                <h2>Rey</h2>
                <p>¡Rey se perdió en el centro de Barcelona! Este gato tan elegante y curioso salió de casa una noche y aún no ha regresado. Si lo ven, por favor llamen al +34 333 33 33 33. ¡Lo extrañamos mucho y queremos que regrese a casa pronto!</p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="js/mascotas_perdidas.js"></script>

</body>

</html>
