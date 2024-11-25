<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetRescue - Encuentra a tus mascotas</title>
    <link rel="stylesheet" href="./estilos/mapa.css">
    <style>
        #map { height: 400px; }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="./js/script.js" defer></script>
</head>

<body>

<?php include 'header.php'; ?>

    <main>
        <h1>Bienvenido al mapa de PetRescue</h1>
        <p>Encuentra a tus mascotas perdidas y explora el mapa para ayudar con el reencuentro de dueños y sus mascotas.</p> 
       
        <br>
       
        <div id="map" style="height: 400px;"></div>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([40.416729, -3.703339], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            map.on('click', function(e) {
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
                    .bindPopup('Mascota perdida').openPopup();
            });
        </script>
        <button class="consultas" onclick="window.location.href='html/consultas.html'">Consulta</button>
    </main>

    <?php include 'footer.php'; ?>

</body>

</html>