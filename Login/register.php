<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "catedra_dss");
    //Verificar si la conexión fue exitosa
    if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
    $con->set_charset("utf8");
    //Escapar datos del formulario
    $newUsername = $con->real_escape_string(trim($_POST['newNombre']));
    $newApellido = $con->real_escape_string(trim($_POST['newApellido']));
    $newCorreo = $con->real_escape_string(trim($_POST['newCorreo']));
    //Preparando la consulta que se va a ejecutar
    $qr = "SELECT correo_usuarios FROM usuarios WHERE correo_usuarios = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("s", $newCorreo);
    $sql->execute();
    $sql->store_result();

    $sql->fetch();

    if ($sql->num_rows > 0) { //Si el correo está, se indicará un error
        $sql->close();
        header("Location: registro.php?errorusuario=si");
    } else { //Si no está, se agregará y enviará el correo a la cuenta
        $sql->close();
        // Generar bytes aleatorios
        $bytes = random_bytes(10); // 10 bytes serán suficientes para 10 caracteres

        // Convertir los bytes en una cadena legible
        $password = base64_encode($bytes);

        // Filtrar caracteres especiales que no deseamos en la contraseña
        $password = str_replace(['/', '+', '='], '', $password);

        // Tomar solo los primeros 10 caracteres
        $password = substr($password, 0, 10);

        $con = new mysqli("localhost", "root", "", "catedra_dss");
        //Verificar si la conexión fue exitosa
        if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
        $con->set_charset("utf8");

        $qr = "INSERT INTO usuarios 
        (nombre_usuarios, apellidos_usuarios, tipo_usuarios, correo_usuarios, contraseña_usuarios) 
        VALUES (?, ?, 'usuario', ?, ?)";
        $sql = $con->prepare($qr);
        $sql->bind_param("ssss", $newUsername, $newApellido, $newCorreo, $password);
        $sql->execute();

        if ($sql->affected_rows > 0) {
            $asunto = "Bienvenido a la familia de GameSivar.";
            $mensaje = "
         <html>
            <head>
                <title>Asignación de contraseña</title>
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
                <h1 align='center'>Saludos de parte de GameSivar, estimado/a <b>" . $newUsername . "</b></h1>
                <p>Te adjuntamos tu nueva contraseña al final de este correo.<br>
                Recuerda cambiar tu contraseña al acceder y no compartirla <br>
                con nadie, tu seguridad depende del cuido que tengas con tu información <br>
                <b>PERSONAL</b><br>
                La contraseña asignada es: <b>$password</b>
           </body>
         </html>
         ";

            // Cabeceras
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: GameSivar <tu_correo@example.com>' . "\r\n";
            $headers .= 'Return-path: ' . $newCorreo;

            // Enviar correo
            if (mail($newCorreo, $asunto, $mensaje, $headers)) {
                header("Location: registro.php?errorusuario=no");
            } else {
                header("Location: registro.php?errorusuario=si");
            }
        } else {
            header("Location: registro.php?errorusuario=si");
        }
    }
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos del formulario
    header("Location: Acceso.php");
    exit;
}
?>