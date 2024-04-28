<?php
session_start();
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");

$tarjeta = $con->real_escape_string(trim($_POST['canjePuntos']));
$puntos = $con->real_escape_string(trim($_POST['puntos']));

$id = $_SESSION["idUserSe"];
// Preparar la consulta para configurar la variable de usuario
$sql = $con->prepare("SET @p0=?");
$sql->bind_param("s", $tarjeta);
$sql->execute();
$sql->close();

// Preparar la consulta para llamar a la función
$sql = $con->prepare("SELECT transferir_puntos(@p0) AS transferir_puntos");
$sql->execute();
$sql->close();

$qr = "SELECT puntos_usuarios FROM usuarios WHERE id_usuarios = ?";
$sql = $con->prepare($qr);
$sql->bind_param("i", $id);
$sql->execute();
$sql->bind_result($puntos);
//Preparando las variables de sesión con los datos
//obtenidos desde la base de datos con bind_result
while ($sql->fetch()) {
    $_SESSION["puntosSe"] = $puntos;
}

$sql->close();

// Cerrar la conexión
$con->close();
header("Location: TarjetasUsuario.php");
