<?php

session_start();
//Conectando a base de datos
$con = new mysqli("localhost", "root", "", "catedra_dss");
//Verificar si la conexión fue exitosa
if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
$con->set_charset("utf8");

//Escapar datos del formulario
$name = $con->real_escape_string(trim($_POST['name']));
$apellidos = $con->real_escape_string(trim($_POST['apellidos']));
$correo = $con->real_escape_string(trim($_POST['email']));
$contra = $con->real_escape_string(trim($_POST['contra']));

$id = $_SESSION['idUserSe'];

if ($correo == $_SESSION['correoSe']) {
    //Preparando la consulta que se va a ejecutar
    $qr = "UPDATE usuarios SET nombre_usuarios = ?, apellidos_usuarios = ?, contraseña_usuarios = ? 
    WHERE id_usuarios = ? ";
    $sql = $con->prepare($qr);
    $sql->bind_param("sssi", $name, $apellidos, $contra, $id);
    $sql->execute();
    //Asociando a variables los datos solicitados en la consulta SELECT

    $qr = "SELECT nombre_usuarios, apellidos_usuarios, contraseña_usuarios FROM usuarios WHERE id_usuarios = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("i", $id);
    $sql->execute();
    $sql->bind_result($name, $apellidos, $contra);
    //Preparando las variables de sesión con los datos
    //obtenidos desde la base de datos con bind_result
    while ($sql->fetch()) {
        $_SESSION["nombreComSe"] = $name . " " . $apellidos;
        $_SESSION['soloNombreSe'] = $name;
        $_SESSION["soloApellidoSe"] = $apellidos;
        $_SESSION["contraSe"] = $contra;
    }
    $sql->close();
    header("Location: Admin.php");
} else {
    // Generar bytes aleatorios
    $bytes = random_bytes(10); // 10 bytes serán suficientes para 10 caracteres

    // Convertir los bytes en una cadena legible
    $contra = base64_encode($bytes);

    // Filtrar caracteres especiales que no deseamos en la contraseña
    $contra = str_replace(['/', '+', '='], '', $contra);

    // Tomar solo los primeros 10 caracteres
    $contra = substr($contra, 0, 10);
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");

    $qr = "UPDATE usuarios SET 
    nombre_usuarios = ?, apellidos_usuarios = ?, correo_usuarios = ?, contraseña_usuarios = ? 
    WHERE id_usuarios = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("ssssi", $name, $apellidos, $correo, $contra, $id);
    $sql->execute();

    // Verificar si la actualización fue exitosa
    if ($sql->affected_rows > 0) {
        $asunto = "Cambio de correo en tu cuenta de GameSivar.";
        $mensaje = "
     <html>
        <head>
            <title>Nuevo correo electrónico</title>
            <style>
            body{
                background-color: #232a34;
            }
            h1,p{
                color:black;
            }
            b{
                color: #72C05B;
            }
            </style>
        </head>
       <body>
            <h1 align='center'>Saludos de parte de GameSivar, estimado/a <b>" . $name . "</b></h1>
            <p>Tu cambio de correo electrónico se hizo sin problemas.<br>
            Te adjuntamos tu nueva contraseña al final de este correo.<br>
            Recuerda no compartir tus credenciales con nadie, tu seguridad<br>
            depende del cuido que tengas con tu información <b>PERSONAL</b><br>
            Tu nueva contraseña es: <b>$contra</b></p>
       </body>
     </html>
     ";

        // Cabeceras
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: GameSivar <tu_correo@example.com>' . "\r\n";
        $headers .= 'Return-path: ' . $correo;

        // Enviar correo
        if (mail($correo, $asunto, $mensaje, $headers)) {
            //Correo exito
            header("Location: ../Inicio/Inicio.php?correo=exito");
        } else {
            //Correo fallo
            header("Location: ../Inicio/Inicio.php?correo=fallo");
        }
    } else {
        //Correo fallo
        header("Location: ../Inicio/Inicio.php?correo=fallo");
    }
    // Cerrar la conexión
    $sql->close();
}
