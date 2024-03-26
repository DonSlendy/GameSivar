<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $newUsername = $_POST["newUsername"];
    $newPassword = $_POST["newPassword"];

    // Aquí deberías realizar la validación de los datos recibidos y posiblemente otras comprobaciones

    // Mostrar mensaje de éxito
    echo "<script>alert('Usuario creado satisfactoriamente.');</script>";

    // Redireccionar al inicio después de mostrar el mensaje
    header("Location: login.html");
    exit;
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos del formulario
    header("Location: registro.html");
    exit;
}
?>
