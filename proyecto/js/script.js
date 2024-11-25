document.addEventListener('DOMContentLoaded', function () {
    //console.log('El script se ha cargado correctamente.');

    var logoutButton = document.getElementById('logoutButton');
    var loginButton = document.getElementById('loginButton');
    var carouselContainer = document.querySelector('.carousel-container');
    var loginForm = document.getElementById('loginForm');

    if (logoutButton) {
        logoutButton.addEventListener('click', function () {
            fetch('cerrar_sesion.php', {
                method: 'POST'
            })
            .then(response => {
                if (response.ok) {
                    alert('Sesión cerrada correctamente.');
                    window.location.href = 'index.php';
                    /*throw new Error('Error al cerrar sesión.');*/
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert('Error al cerrar sesión.');
            });
        });
    }

    if (loginButton) {
        loginButton.addEventListener('click', function () {
            // Abre una nueva pestaña con el formulario de inicio de sesión
            var loginWindow = window.location.href('formulario_inicio_sesion.php', '_blank');
            
            // Agrega un evento para detectar cuando se cierre la nueva pestaña
            if (loginWindow) {
                loginWindow.addEventListener('beforeunload', function () {
                    alert('¡Bienvenido de nuevo!');
                    window.location.href = 'index.php'; // Redirige de vuelta al índice
                });
            }
            
            // Mostrar el formulario con una animación
            mostrarFormularioConAnimacion();
        });
    }

    if (carouselContainer) {
        var slides = carouselContainer.querySelectorAll('.carousel-slide');
        var currentIndex = 0;

        function showSlide(index) {
            slides.forEach(function (slide) {
                slide.style.display = 'none';
            });

            slides[index].style.display = 'block';
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Mostrar el primer slide
        showSlide(currentIndex);

        // Cambiar automáticamente cada 3 segundos
        setInterval(nextSlide, 3000);
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(loginForm);

            fetch('iniciar_sesion.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.close();
                } else {
                    alert('Error al iniciar sesión. ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
});

function mostrarFormularioConAnimacion() {
    var formulario = document.getElementById('formulario');
    formulario.style.display = 'block';
    formulario.style.opacity = '0';

    setTimeout(function() {
        formulario.style.opacity = '1';
    }, 10);
}



