<?php
session_start();
include('conexion.php');

// Variable para almacenar mensajes de error para el inicio de sesión normal
$error_message = '';

// Verifica si el formulario de inicio de sesión normal se ha enviado
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
        if ($password === $row['password_hash']) {
            // Contraseña válida, establece la sesión y redirige
            $_SESSION['usuario'] = $username;

            // Cierra la ventana actual y redirige al índice
            echo '<script>
                    window.close();
                    window.opener.location.href = "index.php";
                  </script>';
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

// Variable para almacenar mensajes de error para el inicio de sesión de administrador
$error_message_admin = '';

// Verifica si el formulario de inicio de sesión de administrador se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminUsuario']) && isset($_POST['adminPassword'])) {
    // Obtiene los datos del formulario de administrador
    $adminUsername = $_POST['adminUsuario'];
    $adminPassword = $_POST['adminPassword'];

    // Verificar si las credenciales de administrador son correctas
    if ($adminUsername === 'admin' && $adminPassword === '1234') {
        // Inicia la sesión de administrador
        $_SESSION['admin'] = true;

        // Redirige directamente a la página de inicio
        header("Location: index.php");
        exit();
    } else {
        // Credenciales de administrador incorrectas, muestra un mensaje de error
        $error_message_admin = "Usuario o contraseña de administrador incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión Administrador</title>
    <link rel="stylesheet" href="estilos/inicio_sesion.css">
</head>
<?php include 'header.php'; ?>
<body>
    <div class="login-container">
        <h2>Inicio de Sesión Administrador</h2>
        
        <?php
        // Muestra el mensaje de error para el inicio de sesión normal si existe
        if ($error_message) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="adminUsuario">Usuario:</label>
            <input type="text" name="adminUsuario" required>

            <label for="adminPassword">Contraseña:</label>
            <input type="password" name="adminPassword" required>

            <input type="submit" value="Iniciar Sesión">
            <div class="buttonContainer">
                <button type="button" onclick="window.location.href = 'registro.php'"
                    class="botonextra">Regístrate</button>
                <br><br>
                <button type="button" onclick="window.location.href = 'formulario_inicio_sesion.php'"
                    class="botonextra">Inicio de sesión</button>
            </div>
        </form>
        

        <p><?php echo $error_message_admin; ?></p>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>
