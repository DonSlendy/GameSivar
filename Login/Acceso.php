<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSivar - Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/style .css">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="../images/logo.png" alt="GameSivar Logo" class="logo">
        </div>
        <?php
        if (isset($_GET["errorusuario"]))
            if ($_GET["errorusuario"] == "si") {
        ?>
            <p>Datos incorrectos</p>
        <?php
            } else {
        ?>
            <p>Ingrese sus credenciales</p>
        <?php
            }
        ?>
        <form id="loginForm" method="POST" action="Autentificar.php">
            <div class="form-group">
                <input type="text" id="username" name="correo" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </div>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <div class="options">
            <a href="registro.html" class="create-account-button">Crear nuevo usuario</a>
            <a href="recuperar_contrasena.html" class="forgot-password-button">¿Olvidaste tu contraseña?</a><br>
            <a href="../Inicio/Inicio.php" class="forgot-password-button">Regresar al principio</a>
        </div>
    </div>
</body>

</html>