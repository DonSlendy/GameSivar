<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el correo electrónico del formulario
    $email = $_POST["email"];

    // Aquí deberías implementar la lógica para enviar un correo de recuperación de contraseña al usuario asociado al correo electrónico proporcionado

    // Por ahora, simplemente mostramos un mensaje de éxito
    echo "Se ha enviado un correo de recuperación de contraseña a $email";
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos del formulario
    header("Location: recuperar_contrasena.html");
    exit;
}
?>
