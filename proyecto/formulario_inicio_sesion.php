<?php
session_start();
include('conexion.php');

// Variable para almacenar mensajes de error
$error_message = '';

// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $username = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta para obtener los datos del usuario
    $query = "SELECT id, password_hash FROM usuarios WHERE username = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($query);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param("s", $username);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener resultados
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtiene los datos del usuario
        $row = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $row['password_hash'])) {
            // Contraseña válida, establece la sesión y redirige
            $_SESSION['usuario'] = $username;

            // Redirige al índice
            header("Location: index.php");
            exit();
        } else {
            // Credenciales incorrectas, muestra un mensaje de error
            $error_message = "Usuario o contraseña incorrectos.";
        }
    } else {
        // Credenciales incorrectas, muestra un mensaje de error
        $error_message = "Usuario o contraseña incorrectos.";
    }

    // Cerrar la consulta después de usarla
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="estilos/inicio_sesion.css">
</head>
<?php include 'header.php'; ?>
<body>
    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        
        <?php
        if ($error_message) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?> 

        <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Iniciar Sesión">
            <div class="buttonContainer">
                <button type="button" onclick="window.location.href = 'registro.php'" class="botonextra">Regístrate</button>
                <br><br>
                <button type="button" onclick="window.location.href = 'administrador.php'" class="botonextra">Administrador</button>
            </div>
         </form>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>
