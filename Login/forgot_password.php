<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GameSivar - Recuperar Contraseña</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="https://kit.fontawesome.com/1c53cb40e6.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="form-container">
            <img src="../images/logo.png" alt="GameSivar Logo" class="logo"><br><br>
            <?php
            //Conectando a base de datos
            $con = new mysqli("localhost", "root", "", "catedra_dss");
            //Verificar si la conexión fue exitosa
            if ($con->connect_errno) die("Error de conexión: (" . $con->errno . ") " . $con->error);
            $con->set_charset("utf8");
            //Escapar datos del formulario
            $usuario = $con->real_escape_string(trim($_POST['nombre']));
            $email = $con->real_escape_string(trim($_POST['email']));
            //Preparando la consulta que se va a ejecutar
            $qr = "SELECT nombre_usuarios, correo_usuarios, tipo_usuarios FROM usuarios WHERE nombre_usuarios = ? AND correo_usuarios = ?";
            $sql = $con->prepare($qr);
            $sql->bind_param("ss", $usuario, $email);
            $sql->execute();
            $sql->bind_result($name, $correo, $tipo);
            $sql->store_result();
            $sql->fetch();


            // Verificar si se encontraron resultados
            if ($sql->num_rows > 0) {
                $sql->close();
                if ($tipo == "admin" || $tipo == "empleado") {
            ?>
                    <h2>¡Usted es un trabajador de nuestra empresa!</h2>
                    <p>Este cambio de credenciales es exclusivo para usuarios de nuestros servicios.</p>
                    <p>Te recomendamos cambies tus credenciales según el rango que se te fue asignado.</p>
                    <a href="../Login/Acceso.php" class="back-button">
                        <button class="regresar"><i class="fa-solid fa-arrow-right-to-bracket fa-flip-horizontal fa-lg"></i> Regresar al login</button>
                    </a>
                <?php
                } else {
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
                    //Escapar datos del formulario
                    $usuario = $con->real_escape_string(trim($_POST['nombre']));
                    $email = $con->real_escape_string(trim($_POST['email']));
                    $qr = "UPDATE usuarios SET contraseña_usuarios = ? WHERE correo_usuarios = ? AND nombre_usuarios = ?";
                    $sql = $con->prepare($qr);
                    $sql->bind_param("sss", $password, $email, $usuario);
                    $sql->execute();

                    // Verificar si la actualización fue exitosa
                    if ($sql->affected_rows > 0) {
                        $asunto = "Restauración de tu cuenta en GameSivar.";
                        $mensaje = "
                     <html>
                        <head>
                            <title>Restauración de contraseña</title>
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
                            <h1 align='center'>Saludos de parte de GameSivar, estimado/a <b>" . $usuario . "</b></h1>
                            <p>Te adjuntamos tu nueva contraseña al final de este correo.<br>
                            Recuerda no compartir tus credenciales con nadie, tu seguridad<br>
                            depende del cuido que tengas con tu información <b>PERSONAL</b><br>
                            Tu nueva contraseña es: <b>$password</b>
                       </body>
                     </html>
                     ";

                        // Cabeceras
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: GameSivar <tu_correo@example.com>' . "\r\n";
                        $headers .= 'Return-path: ' . $email;

                        // Enviar correo
                        if (mail($email, $asunto, $mensaje, $headers)) {
                            echo "<h2>Correo enviado satisfactoriamente.</h2>";
                            echo "<p>Te hemos enviado un correo electrónico a tu dirección: $email, por favor revisa
                            tu correo para que puedas tener de nuevo acceso a nuestra plataforma. Te sugerimos cambiar
                            la contraseña enseguida tengas acceso al sitio web, muchas gracias por tu preferencia</p>";
                            echo
                            "<a href='Acceso.php'>
                            <button class='envio' type='submit'><i class='fa-solid fa-door-open fa-lg'></i> Iniciar Sesión</button>
                            </a";
                        } else {
                            echo "<h2>Correo no enviado.</h2>";
                            echo "<p>Pasó algún error con el correo electrónico de tu dirección: $email. Por favor
                            contacta con nosotros lo antes posible para solventarlo
                            </p>";
                            echo
                            "<a href='../Inicio/Inicio.php'>
                            <button class='regresar'><i class='fa-solid fa-arrow-right-to-bracket fa-flip-horizontal fa-lg'></i> Regresar al sitio web</button>
                            </a>";
                        }
                    } else {
                        echo "<h2>Datos no guardados.</h2>";
                            echo "<p>Pasó algún error con la generación de la nueva contraseña. Por favor
                            contacta con nosotros lo antes posible para solventarlo
                            </p>";
                            echo
                            "<a href='../Inicio/Inicio.php'>
                            <button class='regresar'><i class='fa-solid fa-arrow-right-to-bracket fa-flip-horizontal fa-lg'></i> Regresar al sitio web</button>
                            </a>";
                    }

                    // Cerrar la conexión
                    $sql->close();
                    $con->close();
                }
            } else {
                $sql->close();
                ?>
                <h2>El usuario ingresado no existe.</h2>
                <p>Te recomendamos revisar los datos que registraste en el formulario si crees que fue un error</p>
                <a href="../Login/recuperar_contrasena.html">
                    <button class="recuperar">
                        <i class="fa-solid fa-rotate-left fa-lg"></i> Intentarlo de nuevo
                    </button>
                </a>
                <p>O puedes registrarte con nosotros siguiendo el enlace:</p>
                <a href="../Login/registro.html">
                    <button class="envio"><i class="fa-solid fa-user-plus fa-lg"></i> Registrarse</button>
                </a>
            <?php
            }
            ?>

        </div>
        <script src="../js/script.js"></script>
    </body>

    </html>
<?php
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos del formulario
    header("Location: recuperar_contrasena.html");
    exit;
}
?>