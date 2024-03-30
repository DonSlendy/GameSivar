document.addEventListener("DOMContentLoaded", function() {
    // Manejar el envío del formulario de registro
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

        // Obtener los datos del formulario
        var formData = new FormData(this);

        // Realizar la petición AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Mostrar la alerta cuando el registro sea exitoso
                    alert("Usuario creado satisfactoriamente.");
                    // Redirigir al usuario al inicio
                    window.location.href = "../Login/Acceso.php";
                } else {
                    // Mostrar un mensaje de error si ocurre algún problema
                    alert("Error al procesar la solicitud.");
                }
            }
        };
        xhr.open("POST", this.action, true);
        xhr.send(formData);
    });

    // Manejar el clic en el botón de regreso al inicio
    var backButton = document.querySelector(".back-button");
    if (backButton) {
        backButton.addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = "../Login/Acceso.php";
        });
    }
});
