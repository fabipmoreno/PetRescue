<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMascota = $_POST["nombre"];
    $descripcionMascota = $_POST["descripcion"];

    // Directorio donde se guardarán las imágenes
    $rutaDirectorioImagenes = "imagenes/";

    // Nombre único para la imagen (usando uniqid para generar un identificador único)
    $nombreImagen = uniqid() . '_' . $_FILES["foto"]["name"];
    
    // Ruta completa de la imagen (incluyendo el nombre de archivo)
    $rutaCompletaImagen = $rutaDirectorioImagenes . $nombreImagen;

    // Ruta temporal del archivo cargado
    $rutaTemporalImagen = $_FILES["foto"]["tmp_name"];
    
    // Mover la imagen al directorio de imágenes
    if (move_uploaded_file($rutaTemporalImagen, $rutaCompletaImagen)) {
        // Si se mueve correctamente, guardar la ruta de la imagen en la base de datos
        $rutaImagenBD = $rutaCompletaImagen;
        
        // Crear la conexión PDO
        $pdo = new PDO('mysql:host=localhost; dbname=tfg', 'root', '');

        // Preparar la consulta para insertar el reporte en la base de datos
        $stmt = $pdo->prepare("INSERT INTO mascotasreportes (nombre_mascota, descripcion, foto) VALUES (?, ?, ?)");

        // Ejecutar la consulta con los valores correspondientes
        $stmt->execute([$nombreMascota, $descripcionMascota, $rutaImagenBD]);
        
        // Redirigir a la página de "mascotas_perdidas.php"
        header("Location: mascotas_perdidas.php");
        exit();
        
    } else {
        // Si hay un error al mover la imagen, mostrar un mensaje de error
        echo "Hubo un error al subir la imagen.";
    }
} else {
    // Si no se ha enviado el formulario correctamente, mostrar un mensaje de error
    echo "Error: El formulario no ha sido enviado.";
}
?>
