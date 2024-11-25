<?php

require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Comprobar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $consulta = $_POST["consulta"];

    // Crear la conexión PDO
    $pdo = new PDO('mysql:host=localhost;dbname=tfg', 'root', '');

    // Preparar la consulta para insertar la consulta en la base de datos
    $stmt = $pdo->prepare("INSERT INTO consultas (nombre, email, consulta) VALUES (?, ?, ?)");
    // Ejecutar la consulta con los valores correspondientes
    $stmt->execute([$nombre, $email, $consulta]);

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'petrescuetfg@gmail.com';
        // Usa una contraseña de aplicación en lugar de la contraseña de tu cuenta de Google
        $mail->Password = 'zrqz xdov dsth luer';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('petrescuetfg@gmail.com', 'PetRescue');
        $mail->addAddress('petrescuetfg@gmail.com', 'PetRescue');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva consulta recibida';
        $mail->Body = "Se ha recibido una nueva consulta de $nombre ($email).<br><br>Consulta: $consulta";

        // Enviar el correo electrónico
        $mail->send();

        // Mostrar ventana emergente
        echo '<script>
                window.onload = function() {
                    alert("Consulta enviada correctamente.");
                    window.location.href = "index.php";
                };
              </script>';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

    exit();
} else {
    // Si no se ha enviado el formulario correctamente, mostrar un mensaje de error
    echo "Error: El formulario no ha sido enviado.";
}
?>
