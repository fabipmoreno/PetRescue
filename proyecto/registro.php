<?php
// Incluye el archivo de conexión a la base de datos
include('conexion.php');
session_start(); // Inicia la sesión (si no se ha iniciado)

// Variable para almacenar mensajes de error
$error_message = '';

// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña
    $email = $_POST['email'];

    // Consulta preparada para la inserción segura
    $query = "INSERT INTO usuarios (username, password_hash, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param("sss", $username, $password, $email);

    // Ejecutar la consulta
    $result = $stmt->execute();

    // Verificar si la ejecución de la consulta fue exitosa
    if ($result === false) {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    } 

    // Verificar si se ha insertado correctamente antes de redirigir
    if ($stmt->affected_rows > 0) {
        // Redirigir a la página de inicio de sesión después del registro exitoso
        header("Location: formulario_inicio_sesion.php");
        exit();
    } else {
        // Mostrar un mensaje de error si no se pudo insertar
        $error_message = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - PetRescue</title>
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<?php include 'header.php'; ?>
<body>
    <div class="registro-container">
        <h2>Registro</h2>
        
        <?php
        // Muestra el mensaje de error si existe
        if ($error_message) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        
        <form id="registroForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label for="username">Nombre de Usuario:</label>
            <input type="text" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>

            <input type="submit" value="Registrarse">
            <div class="buttonContainer">
                <button type="button" onclick="window.location.href = 'formulario_inicio_sesion.php'" class="botonextra">Inicio de sesión</button>
                <br><br>
                <button type="button" onclick="window.location.href = 'administrador.php'" class="botonextra">Administrador</button>
            </div>
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>
