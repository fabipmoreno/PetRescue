function openChat(nombre) {
    var modal = document.getElementById("chatModal");
    modal.style.display = "block";
    var chatContent = document.getElementById("chatContent");
    chatContent.innerHTML = "Chat para la mascota: " + nombre;
    // Expandir la ventana de chat
    modal.style.height = "500px"; // Altura expandida
}

function closeChat() {
    var modal = document.getElementById("chatModal");
    modal.style.display = "none";
    // Restaurar la altura original
    modal.style.height = "400px"; // Altura original
}

function sendMessage() {
    var chatInput = document.getElementById("chatInput").value;
    // Validar si el mensaje no está vacío antes de mostrarlo
    if (chatInput.trim() !== "") {
        var chatContent = document.getElementById("chatContent");
        // Agregar el mensaje al contenido del chat
        chatContent.innerHTML += "<p><strong>Tú:</strong> " + chatInput + "</p>";
        // Limpiar el campo de entrada después de enviar el mensaje
        document.getElementById("chatInput").value = "";
        // Hacer scroll hasta el final del contenido
        chatContent.scrollTop = chatContent.scrollHeight;
    }
}
