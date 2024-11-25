<?php
// Iniciar la sesión si no está iniciada
session_start();

// Verificar si el usuario está autenticado
$usuario_autenticado = isset($_SESSION['usuario_autenticado']) && $_SESSION['usuario_autenticado'] === true;
?>

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

<?php include 'header.php'; ?>

    <main>

        <section class="featured-pets">
            <h2>Mascotas rescatadas</h2>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <img src="imagenes/imagen1.jpg" alt="Mascota 1">
                    <p>Keishi</p>
                </div>
                <div class="carousel-slide">
                    <img src="imagenes/imagen2.jpg" alt="Mascota 2">
                    <p>Luca</p>
                </div>
                <div class="carousel-slide">
                    <img src="imagenes/imagen3.jpg" alt="Mascota 3">
                    <p>Puntitos</p>
                </div>
                <div class="carousel-slide">
                    <img src="imagenes/imagen4.jpg" alt="Mascota 4">
                    <p>Cuchibuchi</p>
                </div>
            </div>
        </section>

        <section class="historias_inspiradoras">
            <h2 class="historias-title">Historias inspiradoras</h2>

            <div class="success-stories">
                <div class="story-container">
                    <div class="user-info">
                        <img src="imagenes/user1.png" alt="Usuario 1">
                        <p>Bea</p>
                    </div>
                    <div class="story-content">
                        <img src="imagenes/historia1.png" alt="Historia 1" class="petImg">
                        <p>Conoce a Myko y Mora, unos valientes felinos que encontramos en la calle. Después de meses en la calle y sus dueños darles por perdidos, se les encontró sanos y salvos.</p>
                    </div>
                </div>

                <div class="story-container">
                    <div class="user-info">
                        <img src="imagenes/user2.png" alt="Usuario 2">
                        <p>Toni</p>
                    </div>
                    <div class="story-content">
                        <img src="imagenes/historia2.png" alt="Historia 2" class="petImg">
                        <p>La increíble recuperación de Arya, una perrita robada que fue maltratada, ha permitido devolverle la luz a los dueños como antes.</p>
                    </div>
                </div>

                
                <div class="story-container">
                    <div class="user-info">
                        <img src="imagenes/user3.png" alt="Usuario 3">
                        <p>Señor Oscuro</p>
                    </div>
                    <div class="story-content">
                        <img src="imagenes/historia3.png" alt="Historia 3" class="petImg">
                        <p>Loki, fue encontrado en la calle, un cachorro de 2 meses sobrevivió en la calle desde cachorro, hasta que encontraron un hogar para él.</p>
                    </div>
                </div>
                
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>

</body>

</html>
