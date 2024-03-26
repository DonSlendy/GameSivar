<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simular la autenticación de usuario (sustituye esto con tu lógica de autenticación real)
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Verificar las credenciales (sustituye esto con tu lógica de verificación real)
    if ($username === "usuario" && $password === "contraseña") {
        // Inicio de sesión exitoso
        echo json_encode(array("success" => true));
        exit;
    } else {
        // Credenciales incorrectas
        echo json_encode(array("success" => false, "message" => "Usuario o contraseña incorrectos."));
        exit;
    }
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos del formulario
    header("Location: login.html");
    exit;
}
?>
