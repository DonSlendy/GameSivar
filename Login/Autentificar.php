<?php
session_start();
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");
//Escapar datos del formulario
$correo = $con->real_escape_string(trim($_POST['correo']));
$password = $con->real_escape_string(trim($_POST['password']));
//Preparando la consulta que se va a ejecutar
$qr = "SELECT id_usuarios, nombre_usuarios, apellidos_usuarios, tipo_usuarios, correo_usuarios, contraseña_usuarios, 
puntos_usuarios FROM usuarios WHERE correo_usuarios = ? AND contraseña_usuarios = ?";
$sql = $con->prepare($qr);
$sql->bind_param("ss", $correo, $password);
$sql->execute();
//Asociando a variables los datos solicitados en la consulta SELECT
$sql->bind_result($id, $nombre, $apellido, $tipo, $email, $contra, $puntos);
//Preparando las variables de sesión con los datos
//obtenidos desde la base de datos con bind_result
while ($sql->fetch()) {
    $_SESSION["autenticado"] = "si";
    $_SESSION["idUserSe"] = $id;
    $_SESSION["nombreComSe"] = $nombre . " " . $apellido;
    $_SESSION["tipoSe"] = $tipo;
    $_SESSION["correoSe"] = $email;
    $_SESSION["contraSe"] = $contra;
    $_SESSION["puntosSe"] = $puntos;
}
$sql->close();
//Redirigiendo al usuario a la página de inicio
//si el registro de las variables de sesión fue exitoso
//o de otro modo mandarlo de nuevo a la página de login
if (count($_SESSION) > 0) {
    switch ($tipo) {
        case "usuario":
            header("Location: ../Usuario/Usuario.php");
            break;
        case "admin":
            header("Location: ../Admin/Admin.php");
            break;
        case "empleado";
            header("Location: ../Empleado/Empleado.php");
            break;
        default:
            //A continuación, una carita feliz pq sí :D
            header("Location: Acceso.php?errorusuario=si");
            break;
    }
} else {
    header("Location: Acceso.php?errorusuario=si");
}
?>