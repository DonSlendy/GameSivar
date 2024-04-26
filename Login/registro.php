<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSivar - Registro</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" sizes="144x144" href="../images/ico/icono.png">
    <link rel="shortcut icon" sizes="114x114" href="../images/ico/icono.png">
    <link rel="shortcut icon" sizes="72x72" href="../images/ico/icono.png">
    <link rel="shortcut icon" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/1c53cb40e6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form-container">
        <?php
        if (isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "si") {
        ?>
            <div class="error">
                <h2>Correo electrónico ocupado</h2>
            </div>
        <?php
        } if(isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "no"){
            echo "<div class='acierto'><h2>Revisa tu correo</h2></div>";
        }else {
        ?>
            <h2>Registro</h2>
        <?php
        }
        ?>
        <form id="registerForm" method="post" action="register.php">
            <div class="form-group">
                <input placeholder="Nombres: " type="text" id="newNombre" name="newNombre" required>
            </div>
            <div class="form-group">
                <input placeholder="Apellidos: " type="text" id="newApellido" name="newApellido" required>
            </div>
            <div class="form-group">
                <input placeholder="Correo Electrónico: " type="email" id="newCorreo" name="newCorreo" required>
            </div>
            <div class="form-group">
                <label for="nombre">
                    Te enviaremos la contraseña a tu a tu correo electrónico para que confirmes tu usuario.
                </label>
            </div>
            <button type="submit" class="envio"><i class="fa-solid fa-user-plus fa-lg"></i> Registrar</button>
            <hr>
        </form>
        <a href="Acceso.php">
            <button class="regresar"><i class="fa-solid fa-arrow-right-to-bracket fa-flip-horizontal fa-lg"></i>
                Regresar al inicio</button>
        </a>
    </div>
</body>

</html>