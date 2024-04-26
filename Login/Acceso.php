<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSivar - Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" sizes="144x144" href="../images/ico/icono.png">
    <link rel="shortcut icon" sizes="114x114" href="../images/ico/icono.png">
    <link rel="shortcut icon" sizes="72x72" href="../images/ico/icono.png">
    <link rel="shortcut icon" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/1c53cb40e6.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="../images/logo.png" alt="GameSivar Logo" class="logo">
        </div>
        <?php
        if (isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "si"){
        ?>
            <div class="error">
                <p>Datos incorrectos</p>
            </div>
        <?php
            } else {
        ?>
            <h2>Ingrese sus credenciales</h2>
        <?php
            }
        ?>
        <form id="loginForm" method="POST" action="Autentificar.php">
            <div class="form-group">
                <input type="email" id="username" name="correo" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </div>

            <button class="envio" type="submit"><i class="fa-solid fa-door-open fa-lg"></i> Iniciar Sesión</button>
        </form>
        <hr>
        <div class="options">
            <a href="registro.php">
                <button class="crear"><i class="fa-solid fa-user-plus fa-lg"></i> Crear nuevo usuario</button>
            </a>
            <a href="recuperar_contrasena.html">
                <button class="recuperar"><i class="fa-solid fa-unlock-keyhole fa-lg"></i> ¿Olvidaste tu contraseña?</button>
            </a>
            <a href="../Inicio/Inicio.php">
                <button class="regresar"><i class="fa-solid fa-arrow-right-to-bracket fa-flip-horizontal fa-lg"></i> Regresar al sitio web</button>
            </a>
        </div>
    </div>
</body>

</html>