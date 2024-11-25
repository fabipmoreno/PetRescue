// registro.js
document.addEventListener('DOMContentLoaded', function () {
    var registroForm = document.getElementById('registroForm');

    if (registroForm) {
        registroForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Evita que el formulario se envíe

            // Realiza la lógica de registro aquí

            // Cierra la pestaña actual después de completar el registro
            window.close();

            // Abre la pestaña de inicio de sesión en el índice
            var loginWindow = window.open('formulario_inicio_sesion.php', '_blank');
            
            // Agrega un evento para detectar cuando se cierre la nueva pestaña
            if (loginWindow) {
                loginWindow.addEventListener('beforeunload', function () {
                    alert('¡Bienvenido de nuevo!');
                    window.location.href = 'index.php'; // Redirige de vuelta al índice
                });
            }
        });
    }
});
